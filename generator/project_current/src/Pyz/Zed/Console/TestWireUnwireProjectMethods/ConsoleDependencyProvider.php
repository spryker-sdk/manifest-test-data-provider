<?php

namespace Pyz\Zed\Console\TestWireUnwireProjectMethods;

use Spryker\Zed\Console\TestWireUnwireProjectMethods\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;

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
        ];

        return $commands;
    }

    /**
     * @project Only available in internal nonsplit project, not in public split project.
     *
     * @param array $commands
     *
     * @return array
     */
    protected function addProjectNonsplitOnlyCommands(array $commands): array
    {
        $commands[] = new SprykRunNewConsole();

        return $commands;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    public function getApplicationPlugins(Container $container): array
    {
        $applicationPlugins = parent::getApplicationPlugins($container);

        $applicationPlugins[] = new PropelApplicationPlugin();
        $applicationPlugins[] = new TwigNewApplicationPlugin();

        return $applicationPlugins;
    }

}
