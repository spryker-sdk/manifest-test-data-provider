<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TestIntegratorWireConsoleCommands;

use ArrayObject;
use Pyz\Zed\DataImport\DataImportConfig;
use Pyz\Zed\DependencyCollectionTest\DataImportConsole;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Locale\Communication\Plugin\Application\ConsoleLocaleApplicationPlugin;
use Spryker\Zed\Monitoring\Communication\Plugin\Console\MonitoringConsolePlugin;
use Spryker\Zed\Propel\Communication\Plugin\Application\PropelApplicationPlugin;
use Spryker\Zed\TestIntegratorUnwireConsoleCommands\Console\TestConsole;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestClassExistsConsole;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestDevConsole;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestNewConsole;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestNewConsoleWithCondition;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestNewConsoleWithMissingCondition;
use Spryker\Zed\TestIntegratorWireConsoleCommands\Console\TestPlainConsole;
use Spryker\Zed\Twig\Communication\Plugin\Application\TwigApplicationPlugin;

class ConsoleDependencyProvider extends ParentConsoleDependencyProvider
{
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [
            new DataImportConsole(),
            new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_STORE),
            new TestNewConsole(),
            new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_CURRENCY),
        ];
        $commands[] = new TestPlainConsole();

        if ($this->getConfig()->isDevelopmentConsoleCommandsEnabled()) {
            $commands[] = new TestNewConsoleWithCondition();
            $commands[] = new TestDevConsole();
            if (class_exists(TestClassExistsConsole::class)) {
                $commands[] = new TestClassExistsConsole();
            }
        }
        if (class_exists(TestNewConsoleWithMissingCondition::class)) {
            $commands[] = new TestNewConsoleWithMissingCondition();
        }

        return $commands;
    }

    public function getApplicationPlugins(Container $container): array
    {
        $applicationPlugins = parent::getApplicationPlugins($container);

        $applicationPlugins[] = new PropelApplicationPlugin();
        $applicationPlugins[] = new TwigApplicationPlugin();
        $applicationPlugins[] = new ConsoleLocaleApplicationPlugin();

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
