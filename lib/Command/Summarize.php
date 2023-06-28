<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Command;

use OCA\Llm\Service\LlmService;
use OCP\LanguageModel\SummaryTask;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Summarize extends Command {
	private LlmService $llm;

	public function __construct(LlmService $llm) {
		parent::__construct();
		$this->llm = $llm;
	}

	/**
	 * Configure the command
	 *
	 * @return void
	 */
	protected function configure() {
		$this->setName('llm:summarize')
			->setDescription('Summarizes the input')
			->addArgument('input');
	}

	/**
	 * Execute the command
	 *
	 * @param InputInterface  $input
	 * @param OutputInterface $output
	 *
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		try {
			$output->writeln($this->llm->call(
				$input->getArgument('input'),
				SummaryTask::TYPE
			));
			return 0;
		} catch(\RuntimeException $e) {
			$output->writeln($e->getMessage());
			return 1;
		}
	}
}
