<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Service;

use OCP\ICache;
use OCP\ICacheFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Process;

class LlmService {
	public const CACHE_TTL = 60 * 60 * 24 * 7;

	public const TASKS = [
		'summarize',
		'headline',
		'free_prompt',
	];
	private ICache $cache;

	public function __construct(
		private LoggerInterface $logger,
		ICacheFactory $cacheFactory,
		private SettingsService $settingsService,
	) {
		$this->cache = $cacheFactory->createDistributed('llm');
	}

	/**
	 * @param string $input
	 * @param string $task
	 * @param float|int $timeout
	 * @return string
	 */
	public function call(string $input, string $task, $timeout = 120 * 60) : string {
		if (!in_array($task, self::TASKS)) {
			throw new \RuntimeException('LLM task not recognized');
		}

		$key = $task . '-' . md5($input);
		if ($output = $this->cache->get($key)) {
			return $output;
		}

		$model = $this->settingsService->getSetting('model');
		$modelPath = DownloadModelsService::modelPath($model);
		if (!file_exists($modelPath)) {
			throw new \RuntimeException('LLM model not downloaded');
		}
		$modelFileName = basename($modelPath);

		$command = [
			dirname(__DIR__, 2) . '/python/bin/python3',
			dirname(__DIR__, 2) . '/src-py/index.py',
			'--task', $task,
			'--text', '-',
			'--model', $modelFileName
		];

		$this->logger->debug('Running '.var_export($command, true));

		$proc = new Process($command, __DIR__);
		$proc->setEnv([
			'LLM_THREADS' => $this->settingsService->getSetting('threads'),
		]);
		$proc->setInput($input);
		$proc->setTimeout($timeout);
		try {
			$proc->start();
			$buffer = '';
			$errOut = '';
			foreach ($proc as $type => $data) {
				if ($type !== $proc::OUT) {
					$errOut .= $data;
					continue;
				}
				$buffer .= $data;
			}
			if ($proc->getExitCode() !== 0) {
				$this->logger->warning($errOut);
				throw new \RuntimeException('LLM process failed: process exited with code ' . $proc->getExitCode());
			}
			$buffer = explode('###', $buffer, 2)[1];
			$this->cache->set($key, $buffer, self::CACHE_TTL);
			return $buffer;
		} catch (ProcessTimedOutException $e) {
			$this->logger->warning($errOut, ['exception' => $e ]);
			throw new \RuntimeException('LLM process timeout', 0, $e);
		} catch (RuntimeException $e) {
			$this->logger->warning($errOut, ['exception' => $e ]);
			throw new \RuntimeException('LLM process failed: ' . $e->getMessage(), 0, $e);
		}
	}
}
