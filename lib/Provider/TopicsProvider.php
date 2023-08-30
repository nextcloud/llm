<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Provider;

use OCA\Llm\Service\LlmService;
use OCP\TextProcessing\IProvider;
use OCP\TextProcessing\SummaryTaskType;
use OCP\TextProcessing\TopicsTaskType;

class TopicsProvider implements IProvider {

	public function __construct(
		private LlmService $llm,
	) {
	}

	public function getName(): string {
        return 'Local Large Language Model';
	}

	public function process(string $prompt): string {
		return $this->llm->call($prompt, 'topics');
	}

	public function getTaskType(): string {
		return TopicsTaskType::class;
	}
}
