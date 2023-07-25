<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Provider;

use OCA\Llm\Service\LlmService;
use OCP\TextProcessing\FreePromptTaskType;
use OCP\TextProcessing\IProvider;

class FreePromptProvider implements IProvider {

	public function __construct(
		private LlmService $llm,
	) {
	}

	public function getName(): string {
		return 'Nextcloud Large Language Model App';
	}

	public function process(string $prompt): string {
		return $this->llm->call($prompt, 'free_prompt');
	}

	public function getTaskType(): string {
		return FreePromptTaskType::class;
	}
}
