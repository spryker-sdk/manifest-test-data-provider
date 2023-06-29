<?php

use Spryker\Shared\AppCatalogGui\AppCatalogGuiConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Client\OauthAuth0\OauthAuth0Config;

$config[KernelConstants::PROJECT_NAMESPACE]
    = 'NotPyz';

$config[OauthAuth0Config::TEST_CONSTANT_A] =
$config[OauthAuth0Config::TEST_CONSTANT_C] = 'const_value';

$config[AppCatalogGuiConstants::TEST_CONSTANT_A] =
$config[AppCatalogGuiConstants::TEST_CONSTANT_B] = 'old_value';
