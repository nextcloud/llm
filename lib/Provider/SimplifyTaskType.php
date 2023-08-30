<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Provider;

use OCA\Llm\Service\LlmService;
use OCP\IL10N;
use OCP\TextProcessing\IProvider;
use OCP\TextProcessing\ITaskType;
use OCP\TextProcessing\SummaryTaskType;
use OCP\TextProcessing\TopicsTaskType;

class SimplifyTaskType implements ITaskType {

	public function __construct(
		private IL10N $l10n,
	) {
	}

	public function getName(): string {
        return $this->l10n->t('Simplify');
	}

    public function getDescription(): string {
        return $this->l10n->t('Make the text easier to understand.');
    }
}
