<?php

namespace Pyz\Zed\Console\TestWireUnwire;

use Spryker\Zed\Console\TestWireUnwire\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;

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
            new CacheWarmerConsole(),
            new BuildNavigationConsole(),
        ];

        return $commands;
    }
}
