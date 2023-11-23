<?php

use Spryker\Shared\AppCatalogGui\AppCatalogGuiConstants;
use Spryker\Shared\AppCatalogGui\ErrorHandlerConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\OauthClient\OauthClientConstants;
use Spryker\Client\OauthAuth0\OauthAuth0Config;
use Generated\Shared\Transfer\SubmitPaymentTaxInvoiceTransfer;
use Spryker\Shared\SearchHttp\SearchHttpConstants;

$config[KernelConstants::RESOLVABLE_CLASS_NAMES_CACHE_ENABLED_TRUE] = true;

$config[KernelConstants::RESOLVABLE_CLASS_NAMES_CACHE_ENABLED_FALSE] = false;

$config[KernelConstants::PROJECT_NAMESPACE]
    = 'Pyz';

$config[KernelConstants::VAR_BOOL_CAST_VALUE]
    = (bool)$config[KernelConstants::PROJECT_NAMESPACE];

$config[KernelConstants::FUNC_VALUE]
    = getenv('SOMEKEY');

$config[KernelConstants::PRIVATE_KEY_PATH] = str_replace(
    '__LINE__',
    PHP_EOL,
    getenv('SPRYKER_OAUTH_KEY_PRIVATE') ?: '',
) ?: null;

$config[\Spryker\Shared\Queue\QueueConstants::QUEUE_ADAPTER_CONFIGURATION_DEFAULT] = [
    \Spryker\Shared\Queue\QueueConfig::CONFIG_QUEUE_ADAPTER => \Spryker\Client\RabbitMq\Model\RabbitMqAdapter::class,
    \Spryker\Shared\Queue\QueueConfig::CONFIG_MAX_WORKER_NUMBER => 1,
    \Spryker\Shared\Queue\QueueConfig::CONFIG_FLOAT_VALUE => 10.0,
    \Spryker\Shared\Queue\QueueConfig::CONFIG_BOOL_VALUE => true,
];

$config[KernelConstants::COMPLEX_ARRAY_STRUCTURE] = [
    'SprykerShop',
    APPLICATION_SOURCE_DIR . '/vendor/spryker/payment/config/Zed/Oms',
    getenv('SOMEKEY'),
    (bool)$config[\Spryker\Shared\Kernel\KernelConstants::PROJECT_NAMESPACE]
];

$config[KernelConstants::PRIVATE_NAME] = APPLICATION_SOURCE_DIR . '/Generated/Glue/Specification/spryker_rest_api.schema.yml';

$config[KernelConstants::PRIVATE_NAME2] = [
    APPLICATION_SOURCE_DIR . '/vendor/spryker/payment/config/Zed/Oms',
];

$config[KernelConstants::ENCRYPTION_KEY] = getenv('SPRYKER_OAUTH_ENCRYPTION_KEY') ?: null;

$config[KernelConstants::ENCRYPTION_KEY_OTHER] = getenv('SPRYKER_OAUTH_ENCRYPTION_KEY') ? 'test' : 'other_test';

$config[KernelConstants::AUTH_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'token' => getenv('SPRYKER_ZED_REQUEST_TOKEN') ?: '',
    ],
];

$config[KernelConstants::ACL_DEFAULT_RULES] = [
    [
        'bundle' => 'security-gui',
        'controller' => '*',
        'action' => '*',
        'type' => 'allow',
    ],
    [
        'bundle' => 'acl',
        'controller' => 'index',
        'action' => 'denied',
        'type' => 'allow',
    ],
];

$config[KernelConstants::STORAGE_REDIS_CONNECTION_OPTIONS] = json_decode(getenv('SPRYKER_KEY_VALUE_STORE_CONNECTION_OPTIONS') ?: '[]', true) ?: [];

$config[KernelConstants::LOGGER_CONFIG_GLUE] = KernelConstants::class;

$config[KernelConstants::OAUTH_PROVIDER_NAME] = \Spryker\Zed\OauthAuth0\OauthAuth0Config::PROVIDER_NAME;

$config[KernelConstants::VARIBLE_ASSIGN] = $config;

$config[OauthClientConstants::TEST_CONSTANT_A] =
$config[OauthClientConstants::TEST_CONSTANT_B] =
$config[OauthClientConstants::TEST_CONSTANT_C] = getenv('SPRYKER_OAUTH_ENCRYPTION_KEY') ?: null;

$config[OauthAuth0Config::TEST_CONSTANT_A] =
$config[OauthAuth0Config::TEST_CONSTANT_B] =
$config[OauthAuth0Config::TEST_CONSTANT_C] = 'const_value';

$config[AppCatalogGuiConstants::TEST_CONSTANT_A] =
$config[AppCatalogGuiConstants::TEST_CONSTANT_B] = 'new_value';

$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED;
$config[ErrorHandlerConstants::ERROR_LEVEL_LOG_ONLY] = E_DEPRECATED | E_USER_DEPRECATED;

$config[SearchHttpConstants::TENANT_IDENTIFIER]
    = $config[ProductConstants::TENANT_IDENTIFIER] = [
    SubmitPaymentTaxInvoiceTransfer::class => 'payment-tax-invoice-commands',
];
