<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Pyz\Client\TestIntegratorAddConfigArrayElement;

use Spryker\Client\TestIntegratorAddConfigArrayElement\TestIntegratorAddConfigArrayElementConfig as SprykerTestIntegratorAddConfigArrayElementConfig;

class TestIntegratorAddConfigArrayElementConfig extends SprykerTestIntegratorAddConfigArrayElementConfig
{
    /**
     * @var string
     */
    public const TEST_VALUE_CHANGING = 'Some value';

    protected function getTestConfiguration(): array
    {
        return [
            $this->getTestConfigurationStack1(),
        ];
    }

    protected function getTestConfigurationStack1(): array
    {
        return [];
    }

    protected function getTestArrayMergeConfiguration(): array
    {
        return array_merge(['SomeConf']);
    }
}
