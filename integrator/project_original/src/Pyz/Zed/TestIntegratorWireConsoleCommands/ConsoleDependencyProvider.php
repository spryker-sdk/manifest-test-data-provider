<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TestIntegratorWireConsoleCommands;

use ArrayObject;
use Pyz\Zed\DependencyCollectionTest\DataImportConsole;
use Pyz\Zed\DataImport\DataImportConfig;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Monitoring\Communication\Plugin\Console\MonitoringConsolePlugin;
use Spryker\Zed\Propel\Communication\Plugin\Application\PropelApplicationPlugin;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestPlainConsole;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestDevConsole;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestClassExistsConsole;
use Spryker\Zed\Twig\Communication\Plugin\Application\TwigApplicationPlugin;

class ConsoleDependencyProvider extends ParentConsoleDependencyProvider
{
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [
            new DataImportConsole(),
            new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_STORE),
        ];
        $commands[] = new TestPlainConsole();

        if ($this->getConfig()->isDevelopmentConsoleCommandsEnabled()) {
            $commands[] = new TestDevConsole();
            if (class_exists(TestClassExistsConsole::class)) {
                $commands[] = new TestClassExistsConsole();
            }
        }

        return $commands;
    }

    public function getApplicationPlugins(Container $container): array
    {
        $applicationPlugins = parent::getApplicationPlugins($container);

        $applicationPlugins[] = new PropelApplicationPlugin();
        $applicationPlugins[] = new TwigApplicationPlugin();

        return $applicationPlugins;
    }

    public function getEventSubscriber(Container $container): array
    {
        return [
            new MonitoringConsolePlugin(),
        ];
    }

    public function getEvents(Container $container): array
    {
        return new ArrayObject();
    }
}
