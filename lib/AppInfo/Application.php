<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\AppInfo;

use OCA\Llm\Provider\FormalizeProvider;
use OCA\Llm\Provider\FreePromptProvider;
use OCA\Llm\Provider\HeadlineProvider;
use OCA\Llm\Provider\SimplifyProvider;
use OCA\Llm\Provider\SummaryProvider;
use OCA\Llm\Provider\TopicsProvider;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;

class Application extends App implements IBootstrap {
	public const APP_ID = 'llm';

	public function __construct() {
		parent::__construct(self::APP_ID);
	}

	public function register(IRegistrationContext $context): void {
		$context->registerTextProcessingProvider(FreePromptProvider::class);
		$context->registerTextProcessingProvider(SummaryProvider::class);
		$context->registerTextProcessingProvider(HeadlineProvider::class);
		$context->registerTextProcessingProvider(TopicsProvider::class);
		$context->registerTextProcessingProvider(SimplifyProvider::class);
		$context->registerTextProcessingProvider(FormalizeProvider::class);
	}

	public function boot(IBootContext $context): void {
	}
}
