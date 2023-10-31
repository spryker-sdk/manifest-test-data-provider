<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\RabbitMq;

use Spryker\Client\RabbitMq\RabbitMqConfig as SprykerRabbitMqConfig;
use Generated\Shared\Transfer\ProductConfigurationInstanceTransfer;
use Spryker\Shared\TestIntegrator\TestIntegratorAddArrayElementExisted;
use Spryker\Shared\TestIntegrator\TestIntegratorAddArrayElementFirst;
use Spryker\Shared\TestIntegrator\TestIntegratorAddArrayElementSecond;
use Spryker\Shared\TestIntegrator\PublishAndSynchronizeHealthCheckSearchConfig;

class RabbitMqConfig extends SprykerRabbitMqConfig
{
    public const CHANGE_EXISTING_VALUE = 'test';

    protected function getTestConfiguration(): array
    {
        return [
            TestIntegratorAddArrayElementExisted::TEST_INTEGRATION_ADD_ARRAY_ELEMENT_CONST_EXISTED,
            TestIntegratorAddArrayElementFirst::TEST_INTEGRATION_ADD_ARRAY_ELEMENT_CONST_FIRST,
            TestIntegratorAddArrayElementSecond::TEST_INTEGRATION_ADD_ARRAY_ELEMENT_CONST_SECOND,
        ];
    }

    /**
     * @return list<string>
     */
    public function getConfigurationFieldsNotAllowedForEncoding(): array
    {
        return [
            ProductConfigurationInstanceTransfer::QUANTITY,
        ];
    }

    protected function getQueueConfiguration(): array
    {
        return array_merge(
            [],
            $this->getSynchronizationConfiguration(),
            $this->getSynchronizationQueueConfiguration(),
        );
    }

    protected function getSynchronizationConfiguration(): array
    {
        return [
            PublishAndSynchronizeHealthCheckSearchConfig::SYNC_SEARCH_PUBLISH_AND_SYNCHRONIZE_HEALTH_CHECK,
        ];
    }

    protected function getSynchronizationQueueConfiguration(): array
    {
        return [
            PublishAndSynchronizeHealthCheckSearchConfig::SYNC_SEARCH_PUBLISH_AND_SYNCHRONIZE_HEALTH_CHECK,
        ];
    }

    /**
     * @return list<string>
     */
    public function getChangeExistingValue(): array
    {
        return [static::CHANGE_EXISTING_VALUE];
    }
}
