<?php

namespace Pyz\Zed\Console\TestWireUnwireDev;

use Spryker\Zed\Console\TestWireUnwireDev\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;

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
            $commands[] = new RouterDebugBackofficeConsole();

            if (class_exists(BenchmarkRunConsole::class)) {
                $commands[] = new BenchmarkNewRunConsole();
            }
        }

        return $commands;
    }
}
