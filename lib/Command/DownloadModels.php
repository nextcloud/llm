<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Command;

use OCA\Llm\Service\DownloadModelsService;
use OCA\Llm\Service\SettingsService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DownloadModels extends Command {
	public function __construct(
		private DownloadModelsService $downloader,
		private SettingsService $settings,
	) {
		parent::__construct();
	}

	/**
	 * Configure the command
	 *
	 * @return void
	 */
	protected function configure() {
		$this->setName('llm:download-model')
			->setDescription('Download the necessary machine learning model (~4GB)');
		$this->addOption('force', 'f', InputOption::VALUE_NONE, 'Force download even if the model(s) are downloaded already');
		$this->addArgument('model', InputArgument::REQUIRED, 'Choose the model to download: '. implode(", ", array_keys(DownloadModelsService::MODELS)));
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
			$output->writeln("Downloading model");
			if ($this->downloader->download($input->getArgument('model'), $input->getOption('force'))) {
				$output->writeln('Successful');
				$this->settings->setSetting('model', $input->getArgument('model'));
			}
		} catch (\Exception $ex) {
			$output->writeln('<error>Failed to download model</error>');
			$output->writeln($ex->getMessage());
			return 1;
		}

		return 0;
	}
}
