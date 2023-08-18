<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Pyz\Zed\TestIntegratorUnwireConsoleCommands;

use Pyz\Zed\DataImport\DataImportConfig;
use Pyz\Zed\DependencyCollectionTest\DataImportConsole;

class ConsoleDependencyProvider
{
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [];
        $commands[] = new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_CURRENCY);

        return $commands;
    }
}
