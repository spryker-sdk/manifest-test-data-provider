<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Pyz\Client\TestIntegratorAddConfigArrayElement;

use Spryker\Client\TestIntegratorAddConfigArrayElement\TestIntegratorAddConfigArrayElementConfig as SprykerTestIntegratorAddConfigArrayElementConfig;
use Spryker\Shared\TestIntegrator\TestIntegratorAddConfigArrayElement;
use Spryker\Shared\TestIntegrator\TestIntegratorAddConfigArrayElementAfter;
use Spryker\Shared\TestIntegrator\TestIntegratorAddConfigArrayElementBefore;

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
            TestIntegratorAddConfigArrayElementBefore::TEST_INTEGRATION_ADD_CONFIG_ARRAY_ELEMENT_CONST_BEFORE,
            TestIntegratorAddConfigArrayElementAfter::TEST_INTEGRATION_ADD_CONFIG_ARRAY_ELEMENT_CONST_AFTER,
            TestIntegratorAddConfigArrayElement::TEST_INTEGRATION_ADD_CONFIG_ARRAY_ELEMENT_CONST,
        ];
    }

    protected function getTestConfigurationStack1(): array
    {
        return [
            TestIntegratorAddConfigArrayElement::TEST_INTEGRATION_ADD_CONFIG_ARRAY_ELEMENT_CONST,
        ];
    }

    protected function getTestArrayMergeConfiguration(): array
    {
        return array_merge(['SomeConf'], [
            TestIntegratorAddConfigArrayElement::TEST_INTEGRATION_ADD_CONFIG_ARRAY_ELEMENT_CONST,
        ]);
    }

    protected function getNotExistOnProjectLevelTestConfiguration(): array
    {
        return [
            TestIntegratorAddConfigArrayElement::TEST_INTEGRATION_ADD_CONFIG_ARRAY_ELEMENT_CONST,
        ];
    }
}
