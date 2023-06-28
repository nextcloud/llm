<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Service;

use OCA\Llm\AppInfo\Application;
use OCP\IConfig;

class SettingsService {
	public const DEFAULTS = [
		'python_binary' => '',
		'threads' => 4,
	];

	public function __construct(
		private IConfig $config,
	) {
	}

	/**
	 * @param string $key
	 * @return string
	 */
	public function getSetting(string $key): string {
		return $this->config->getAppValue(Application::APP_ID, $key, json_encode(self::DEFAULTS[$key]));
	}

	/**
	 * @param string $key
	 * @param string $value
	 * @return void
	 * @throws \Exception
	 */
	public function setSetting(string $key, string $value): void {
		if (!array_key_exists($key, self::DEFAULTS)) {
			throw new \Exception('Unknown settings key '.$key);
		}
		$this->config->setAppValue(Application::APP_ID, $key, $value);
	}

	/**
	 * @return array
	 */
	public function getAll(): array {
		$settings = [];
		foreach (array_keys(self::DEFAULTS) as $key) {
			$settings[$key] = $this->getSetting($key);
		}
		return $settings;
	}
}
