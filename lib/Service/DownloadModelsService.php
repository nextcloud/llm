<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Service;

use Exception;
use FilesystemIterator;
use OCP\Http\Client\IClientService;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class DownloadModelsService {
	private IClientService $clientService;
	private bool $isCLI;

	public const MODEL_LLAMA = 'llama-2';
	public const MODEL_GPT4ALL_FALCON = 'gpt4all-falcon';
	public const MODEL_LEO_HESSIANAI = 'leo-hessianai';
	public const MODEL_NEURALBEAGLE = 'neuralbeagle';

	public const MODELS = [
		self::MODEL_LLAMA => 'https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/llama-2-7b-chat.Q4_K_M.gguf',
		self::MODEL_GPT4ALL_FALCON => 'https://download.nextcloud.com/server/apps/llm/gpt4all-falcon-q4_0.gguf',
		self::MODEL_LEO_HESSIANAI => 'https://download.nextcloud.com/server/apps/llm/leo-hessianai-13B-chat-bilingual-GGUF/leo-hessianai-13b-chat-bilingual.Q4_K_M.gguf',
		self::MODEL_NEURALBEAGLE => 'https://download.nextcloud.com/server/apps/llm/neuralbeagle14-7b.Q4_K_M.gguf',
	];

	public function __construct(IClientService $clientService, bool $isCLI) {
		$this->clientService = $clientService;
		$this->isCLI = $isCLI;
	}

	/**
	 * @return bool
	 * @throws \Exception
	 */
	public function download(string $model, $force = false): bool {
		if (!in_array($model, array_keys(self::MODELS))) {
			throw new Exception('Unknown model');
		}
		$modelPath = $this->modelPath($model);
		if (file_exists($modelPath)) {
			if ($force) {
				// remove model directory
				$it = new RecursiveDirectoryIterator($modelPath, FilesystemIterator::SKIP_DOTS);
				$files = new RecursiveIteratorIterator($it,
					RecursiveIteratorIterator::CHILD_FIRST);
				foreach ($files as $file) {
					if ($file->isDir()) {
						rmdir($file->getRealPath());
					} else {
						unlink($file->getRealPath());
					}
				}
				rmdir($modelPath);
			} else {
				return true;
			}
		}
		$timeout = $this->isCLI ? 0 : 480;
		$this->clientService->newClient()->get(self::MODELS[$model], ['sink' => $modelPath, 'timeout' => $timeout]);
		return true;
	}

	public static function modelPath(string $model): string {
		return __DIR__ . '/../../src-py/models/' . basename(self::MODELS[$model]);
	}
}
