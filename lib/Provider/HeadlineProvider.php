<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Provider;

use OCA\Llm\Service\LlmService;
use OCP\TextProcessing\HeadlineTaskType;
use OCP\TextProcessing\IProvider;

class HeadlineProvider implements IProvider {

	public function __construct(
		private LlmService $llm,
	) {
	}

	public function getName(): string {
        return 'Local Large Language Model';
	}

	public function process(string $prompt): string {
		return $this->llm->call($prompt, 'headline');
	}

	public function getTaskType(): string {
		return HeadlineTaskType::class;
	}
}
