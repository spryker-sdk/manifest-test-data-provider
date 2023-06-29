<?php

namespace Pyz\Zed\Console\TestWireConstructor;

use Spryker\Zed\Console\TestWireConstructor\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;

class ConsoleDependencyProvider extends SprykerConsoleDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array<\Symfony\Component\Console\Command\Command>
     */
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [
        ];

        return $commands;
    }
}
