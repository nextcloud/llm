<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Controller;

use OCA\Llm\Service\SettingsService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IConfig;
use OCP\IRequest;

class AdminController extends Controller {
	public function __construct(
		string $appName,
		IRequest $request,
		private IConfig $config,
		private SettingsService $settingsService,
	) {
		parent::__construct($appName, $request);
	}

	public function python(): JSONResponse {
		try {
			exec(escapeshellcmd(json_decode($this->settingsService->getSetting('python_binary')) ?: 'python3') . ' --version' . ' 2>&1', $output, $returnCode);
		} catch (\Throwable $e) {
			return new JSONResponse(['python' => false]);
		}

		try {
			exec(escapeshellcmd(dirname(__DIR__, 2) . '/python/bin/python3') . ' --version' . ' 2>&1', $output2, $returnCode2);
		} catch (\Throwable $e) {
			return new JSONResponse(['python' => false]);
		}

		if ($returnCode !== 0 || $returnCode2 !== 0) {
			return new JSONResponse(['python' => false]);
		}

		return new JSONResponse(['python' => explode(' ', trim($output[0])[1])]);
	}

	public function cron(): JSONResponse {
		$cron = $this->config->getAppValue('core', 'backgroundjobs_mode', '');
		return new JSONResponse(['cron' => $cron]);
	}

	public function setSetting(string $setting, $value): JSONResponse {
		try {
			$this->settingsService->setSetting($setting, $value);
			return new JSONResponse([], Http::STATUS_OK);
		} catch (\Exception $e) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
	}

	public function getSetting(string $setting):JSONResponse {
		return new JSONResponse(['value' => $this->settingsService->getSetting($setting)]);
	}
}
