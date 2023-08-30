<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Settings;

use OCA\Llm\AppInfo\Application;
use OCA\Llm\Service\DownloadModelsService;
use OCA\Llm\Service\SettingsService;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Services\IInitialState;
use OCP\Settings\ISettings;

class AdminSettings implements ISettings {

	public function __construct(
		private IInitialState $initialState,
		private SettingsService $settingsService,
	) {
	}

	/**
	 * @return TemplateResponse
	 */
	public function getForm(): TemplateResponse {
		$settings = $this->settingsService->getAll();
		$this->initialState->provideInitialState('settings', $settings);

		$modelsPath = __DIR__ . '/../../src-py/models';
        $modelsDownloaded = [];
        foreach (DownloadModelsService::MODELS as $model => $url) {
            $modelsDownloaded[$model] = file_exists($modelsPath . '/' . basename($url));
        }
		$this->initialState->provideInitialState('modelsDownloaded', $modelsDownloaded);

		return new TemplateResponse(Application::APP_ID, 'admin');
	}

	/**
	 * @return string the section ID, e.g. 'sharing'
	 */
	public function getSection(): string {
		return 'llm';
	}

	/**
	 * @return int whether the form should be rather on the top or bottom of the admin section. The forms are arranged in ascending order of the priority values. It is required to return a value between 0 and 100.
	 */
	public function getPriority(): int {
		return 50;
	}
}
