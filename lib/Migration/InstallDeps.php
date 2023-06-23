<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-FileCopyrightText: Joas Schilling <code@schilljs.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Llm\Migration;

use OCP\IConfig;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Psr\Log\LoggerInterface;

class InstallDeps implements IRepairStep {
	protected IConfig $config;
	private string $pythonDir;
	private LoggerInterface $logger;

	public function __construct(IConfig $config, LoggerInterface $logger) {
		$this->config = $config;
		$this->pythonDir = dirname(__DIR__, 2) . '/python/';
		$this->logger = $logger;
	}

	public function getName(): string {
		return 'Install dependencies';
	}

	public function run(IOutput $output): void {
        $this->runPoetryInstall();
	}
    protected function runPoetryInstall() : void {
        $oriCwd = getcwd();
        chdir(dirname(__DIR__, 2));
        $venv = dirname(__DIR__, 2) . '/python';
        $python = $venv . '/bin/';
        $env = 'PATH='.escapeshellcmd($venv).'/bin:'.':$PATH VIRTUAL_ENV=' . escapeshellcmd($venv);
        try {
            $output = '';
            $cmd1 = escapeshellcmd('python3') . ' -m venv ./python';
            exec($cmd1 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
            if ($returnCode !== 0) {
                chdir($oriCwd);
                $this->logger->error('Failed to install  python dependencies: '.trim(implode("\n", $output)));
                throw new \Exception('Failed to install  python dependencies: '.trim(implode("\n", $output)));
            }
            $output = '';
            $cmd1 = $env . ' ' . escapeshellcmd($python . 'python3') . ' ' . escapeshellcmd($python . 'pip3 ') . ' install pipx';
            exec($cmd1 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
            if ($returnCode !== 0) {
                chdir($oriCwd);
                $this->logger->error('Failed to install  python dependencies: '.trim(implode("\n", $output)));
                throw new \Exception('Failed to install  python dependencies: '.trim(implode("\n", $output)));
            }
            $output = '';
            $cmd2 =  $env . ' PIPX_HOME=' . $venv .  ' ' . 'PIPX_BIN_DIR=' . $python . ' ' .escapeshellcmd($python . 'python3') . ' ' . escapeshellcmd($python . 'pipx') . ' install poetry';
            exec($cmd2 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
            if ($returnCode !== 0) {
                chdir($oriCwd);
                $this->logger->error('Failed to install  python dependencies: '.trim(implode("\n", $output)));
                throw new \Exception('Failed to install  python dependencies: '.trim(implode("\n", $output)));
            }
            chdir(dirname(__DIR__, 2).'/src-py');
            $output = '';
            $cmd3 = $env . ' ' . escapeshellcmd($python . 'poetry ') . ' install --no-root';
            exec($cmd3 . ' 2>&1', $output, $returnCode); // Appending  2>&1 to avoid leaking sterr
            if ($returnCode !== 0) {
                chdir($oriCwd);
                $this->logger->error('Failed to install  python dependencies: '.trim(implode("\n", $output)));
                throw new \Exception('Failed to install  python dependencies: '.trim(implode("\n", $output)));
            }
        } catch (\Throwable $e) {
            chdir($oriCwd);
            $this->logger->error('Failed to install python dependencies: '.$e->getMessage(), ['exception' => $e]);
            throw new \Exception('Failed to install python dependencies: '.$e->getMessage());
        }
        chdir($oriCwd);
    }
}
