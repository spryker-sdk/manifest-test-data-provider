<?php

use Spryker\Shared\Kernel\KernelConstants;
use Generated\Shared\Transfer\MerchantUpdatedTransfer;
use Spryker\Shared\SearchHttp\SearchHttpConstants;
use Spryker\Shared\Product\ProductConstants;

$config[KernelConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];
$config[KernelConstants::CORE_NAMESPACES] = [
    'SprykerShop',
    'SprykerEco',
    'Spryker',
    'SprykerSdk',
];
$config[\Pyz\Client\TestIntegratorAddConfigArrayElement\TestIntegratorAddConfigArrayElementConfig::TEST_VALUE_CHANGING] = 'Original value';

$config[SearchHttpConstants::TENANT_IDENTIFIER]
    = $config[ProductConstants::TENANT_IDENTIFIER] = [
    MerchantUpdatedTransfer::class => 'merchant-events',
];
