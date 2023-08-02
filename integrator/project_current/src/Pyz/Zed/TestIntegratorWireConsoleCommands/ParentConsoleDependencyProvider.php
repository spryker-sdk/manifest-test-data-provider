<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TestIntegratorWireConsoleCommands;

use Spryker\Zed\Kernel\Container;

class ParentConsoleDependencyProvider
{
    public function getApplicationPlugins(Container $container): array
    {
        return [];
    }
}
