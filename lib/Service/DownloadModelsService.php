<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Service;

use Exception;
use OCP\Http\Client\IClientService;

class DownloadModelsService {
	private IClientService $clientService;
	private bool $isCLI;

	public const MODEL_LLAMA = 'llama-2';
	public const MODEL_GPT4ALL_FALCON = 'gpt4all-falcon';
	public const MODEL_LEO_HESSIANAI = 'leo-hessianai';
	public const MODEL_NEURALBEAGLE = 'neuralbeagle';

	public const MODELS = [
		self::MODEL_LLAMA => 'https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/llama-2-7b-chat.Q4_K_M.gguf',
		self::MODEL_GPT4ALL_FALCON => 'https://huggingface.co/Nextcloud-AI/llm_gpt4all_falcon_7b_q4_gguf/resolve/main/gpt4all-falcon-newbpe-q4_0.gguf',
		self::MODEL_LEO_HESSIANAI => 'https://download.nextcloud.com/server/apps/llm/leo-hessianai-13B-chat-bilingual-GGUF/leo-hessianai-13b-chat-bilingual.Q4_K_M.gguf',
		self::MODEL_NEURALBEAGLE => 'https://download.nextcloud.com/server/apps/llm/neuralbeagle14-7b.Q4_K_M.gguf',
	];

	private const MODEL_HASHES = [
		self::MODEL_LLAMA => '08a5566d61d7cb6b420c3e4387a39e0078e1f2fe5f055f3a03887385304d4bfa',
		self::MODEL_GPT4ALL_FALCON => '29f1f510535762a94009332f754dff77fc6014a0a0d2c93a34f0457f3cb66c73',
		self::MODEL_LEO_HESSIANAI => 'e4dcdde73bd4ea6975a588c0ace974734cd7419d68ba5d58efa12b37f7eb802f',
		self::MODEL_NEURALBEAGLE => 'da8dc393b988406ec1e42dcda3b31bcb2c247b8f8bb91fc0b25c893a22b11aaf',
	];

	public function __construct(IClientService $clientService, bool $isCLI) {
		$this->clientService = $clientService;
		$this->isCLI = $isCLI;
	}

	/**
	 * @return bool
	 * @throws \Exception
	 */
	public function download(string $model, bool $force = false): bool {
		if (!in_array($model, array_keys(self::MODELS))) {
			throw new Exception('Unknown model');
		}
		$modelPath = $this->modelPath($model);
		if (file_exists($modelPath)) {
			if ($force === true) {
				// Remove the existing model file
				unlink($modelPath);
			} else {
				return true;
			}
		}
		$timeout = $this->isCLI ? 0 : 480;
		$this->clientService->newClient()->get(self::MODELS[$model], ['sink' => $modelPath, 'timeout' => $timeout]);

		// Check that the sha256 hash matches for the newly downloaded file
		$hash = hash_file('sha256', $modelPath);
		if ($hash !== self::MODEL_HASHES[$model]) {
			// Delete the file (so it doesn't get used by the app)
			unlink($modelPath);
			throw new Exception('Downloading the model file failed: file hash mismatch');
		}
		return true;
	}

	public static function modelPath(string $model): string {
		return __DIR__ . '/../../src-py/models/' . basename(self::MODELS[$model]);
	}
}
