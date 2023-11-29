<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Command;

use OCP\TextProcessing\IManager;
use OCP\TextProcessing\SummaryTaskType;
use OCP\TextProcessing\Task;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Summarize extends Command {

	public function __construct(
		private IManager $textProcessing
	) {
		parent::__construct();
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
			$task = new Task(SummaryTaskType::class, $input->getArgument('input'), 'llm', 'admin');
			$this->textProcessing->runTask($task);
			$output->writeln($task->getOutput());
			return 0;
		} catch(\RuntimeException $e) {
			$output->writeln($e->getMessage());
			return 1;
		}
	}
}
