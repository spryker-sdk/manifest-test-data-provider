<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Pyz\Zed\TestIntegratorUnwireConsoleCommands;

use Pyz\Zed\DataImport\DataImportConfig;
use Pyz\Zed\DependencyCollectionTest\DataImportConsole;
use Spryker\Zed\TestIntegratorUnwireConsoleCommands\Console\TestClassExistsConsole;
use Spryker\Zed\TestIntegratorUnwireConsoleCommands\Console\TestConsole;
use Spryker\Zed\TestIntegratorUnwireConsoleCommands\Console\TestDevConsole;
use Spryker\Zed\TestIntegratorUnwireConsoleCommands\Console\TestPlainConsole;

class ConsoleDependencyProvider
{
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [];
        $commands[] = new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_STORE);
        $commands[] = new TestPlainConsole();
        $commands[] = new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_CURRENCY);
        $commands[] = new TestConsole();

        if ($this->getConfig()->isDevelopmentConsoleCommandsEnabled()) {
            $commands[] = new TestDevConsole();
            if (class_exists(TestClassExistsConsole::class)) {
                $commands[] = new TestClassExistsConsole();
            }
        }

        return $commands;
    }
}
