<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Command;

use OCA\Llm\Service\DownloadModelsService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DownloadModels extends Command {
	private DownloadModelsService $downloader;

	public function __construct(DownloadModelsService $downloader) {
		parent::__construct();
		$this->downloader = $downloader;
	}

	/**
	 * Configure the command
	 *
	 * @return void
	 */
	protected function configure() {
		$this->setName('llm:download-models')
			->setDescription('Download the necessary machine learning models');
		$this->addOption('force', 'f', InputOption::VALUE_NONE, 'Force download even if the model(s) are downloaded already');
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
            if ($this->downloader->download($input->getOption('force'))) {
                $output->writeln('Successful');
            }
		} catch (\Exception $ex) {
			$output->writeln('<error>Failed to download models</error>');
			$output->writeln($ex->getMessage());
			return 1;
		}

		return 0;
	}
}
