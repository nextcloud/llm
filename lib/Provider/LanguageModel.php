<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Provider;

use OCA\Llm\Service\LlmService;
use OCP\LanguageModel\FreePromptTask;
use OCP\LanguageModel\HeadlineTask;
use OCP\LanguageModel\IHeadlineProvider;
use OCP\LanguageModel\ILanguageModelProvider;
use OCP\LanguageModel\ISummaryProvider;
use OCP\LanguageModel\SummaryTask;

class LanguageModel implements ILanguageModelProvider, ISummaryProvider, IHeadlineProvider {

    public function __construct(
        private LlmService $llm,
    ) {
	}

	public function getName(): string {
		return 'Nextcloud local LanguageModel';
	}

    public function prompt(string $prompt): string {
        return $this->llm->call($prompt, FreePromptTask::TYPE);
    }

    public function findHeadline(string $text): string {
        return $this->llm->call($text, HeadlineTask::TYPE);
    }

    public function summarize(string $text): string {
        return $this->llm->call($text, SummaryTask::TYPE);
    }
}
