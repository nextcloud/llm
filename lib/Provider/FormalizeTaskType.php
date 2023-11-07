<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\Llm\Provider;

use OCP\IL10N;
use OCP\TextProcessing\ITaskType;

class FormalizeTaskType implements ITaskType {

	public function __construct(
		private IL10N $l10n,
	) {
	}

	public function getName(): string {
		return $this->l10n->t('Formalize');
	}

	public function getDescription(): string {
		return $this->l10n->t('Rephrase the text to be more formal and polite instead of casual.');
	}
}
