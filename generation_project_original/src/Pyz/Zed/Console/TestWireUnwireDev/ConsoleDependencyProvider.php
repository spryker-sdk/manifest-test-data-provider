<?php

namespace Pyz\Zed\Console\TestWireUnwireDev;

use Spryker\Zed\Console\TestWireUnwireDev\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;
use Spryker\Zed\Router\Communication\Plugin\Console\RouterDebugBackofficeConsole;

class ConsoleDependencyProvider extends SprykerConsoleDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array<\Symfony\Component\Console\Command\Command>
     */
    protected function getConsoleCommands(Container $container): array
    {
        if ($this->getConfig()->isDevelopmentConsoleCommandsEnabled()) {
            if (class_exists(BenchmarkRunConsole::class)) {
                $commands[] = new BenchmarkRunConsole();
            }
        }

        return $commands;
    }
}
