<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Service;

use FilesystemIterator;
use OCP\Http\Client\IClientService;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class DownloadModelsService {
	private IClientService $clientService;
	private bool $isCLI;

    public const MODEL_NAME = 'ggml-gpt4all-j-v1.3-groovy.bin';

	public function __construct(IClientService $clientService, bool $isCLI) {
		$this->clientService = $clientService;
		$this->isCLI = $isCLI;
	}

	/**
	 * @return bool
	 * @throws \Exception
	 */
	public function download($force = false) : bool {
		$modelPath = __DIR__ . '/../../src-py/models/' . self::MODEL_NAME;
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
		$modelUrl = $this->getModelUrl(self::MODEL_NAME);
		$timeout = $this->isCLI ? 0 : 480;
		$this->clientService->newClient()->get($modelUrl, ['sink' => $modelPath, 'timeout' => $timeout]);
		return true;
	}

	public function getModelUrl(string $model): string {
		return "https://download.nextcloud.com/server/apps/llm/$model";
	}
}
