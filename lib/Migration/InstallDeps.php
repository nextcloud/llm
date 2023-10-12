<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-FileCopyrightText: Joas Schilling <code@schilljs.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Migration;

use OCA\Llm\Service\SettingsService;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Psr\Log\LoggerInterface;

class InstallDeps implements IRepairStep {

	public function __construct(
		private LoggerInterface $logger,
		private SettingsService $settingsService,
	) {
	}

	public function getName(): string {
		return 'Install dependencies for llm app';
	}

	public function run(IOutput $output): void {
		$this->runPoetryInstall();
	}
	protected function runPoetryInstall() : void {
		$oriCwd = getcwd();
		chdir(dirname(__DIR__, 2));
		$venv = dirname(__DIR__, 2) . '/python';
		$python = $venv . '/bin/';
		$env = 'PATH='.escapeshellcmd($venv).'/bin:'.'$PATH VIRTUAL_ENV=' . escapeshellcmd($venv) . ' POETRY_CACHE_DIR=' . escapeshellcmd($venv . '/.cache');
		try {
			$output = '';
			$cmd0 = ($this->settingsService->getSetting('python_binary') !== '' ? $this->settingsService->getSetting('python_binary') : 'python3') . ' -m venv ./python';
			exec($cmd0 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
			if ($returnCode !== 0) {
				chdir($oriCwd);
				$this->logger->error('Failed to create python venv: '.$cmd0.' returned '.trim(implode("\n", $output)));
				throw new \Exception('Failed to create python venv: '.$cmd0.' returned '.trim(implode("\n", $output)));
			}
			$output = '';
			$cmd1 = $env . ' ' . escapeshellcmd($python . 'python3') . ' ' . escapeshellcmd($python . 'pip3 ') . ' install pipx';
			exec($cmd1 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
			if ($returnCode !== 0) {
				chdir($oriCwd);
				$this->logger->error('Failed to install pipx: '.$cmd1.' returned '.trim(implode("\n", $output)));
				throw new \Exception('Failed to install pipx: '.$cmd1.' returned '.trim(implode("\n", $output)));
			}
			$output = '';
            // "< 1.4" avoids https://github.com/python-poetry/poetry/issues/7611
			$cmd2 = $env . ' PIPX_HOME=' . $venv .  ' ' . 'PIPX_BIN_DIR=' . $python . ' ' .escapeshellcmd($python . 'python3') . ' ' . escapeshellcmd($python . 'pipx') . ' install poetry';
			exec($cmd2 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
			if ($returnCode !== 0) {
				chdir($oriCwd);
				$this->logger->error('Failed to install poetry: '.$cmd2.' returned '.trim(implode("\n", $output)));
				throw new \Exception('Failed to install poetry: '.$cmd2.' returned '.trim(implode("\n", $output)));
			}
			chdir(dirname(__DIR__, 2).'/src-py');
			$output = '';
			$cmd3 = $env . ' ' . escapeshellcmd($python . 'poetry ') . ' install --no-root';
			exec($cmd3 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
			if ($returnCode !== 0) {
				chdir($oriCwd);
				$this->logger->error('Failed to install python dependencies: '.$cmd3.' returned '.trim(implode("\n", $output)));
				throw new \Exception('Failed to install python dependencies: '.$cmd3.' returned '.trim(implode("\n", $output)));
			}
		} catch (\Throwable $e) {
			chdir($oriCwd);
			$this->logger->error('Failed to install python dependencies: '.$e->getMessage(), ['exception' => $e]);
			throw new \Exception('Failed to install python dependencies: '.$e->getMessage());
		}
		chdir($oriCwd);
	}
}
