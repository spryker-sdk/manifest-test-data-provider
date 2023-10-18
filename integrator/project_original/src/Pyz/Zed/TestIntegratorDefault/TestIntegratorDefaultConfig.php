<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Pyz\Zed\TestIntegratorDefault;

use App\Manifest\Generator\ArrayConfigElementManifestStrategy;
use Spryker\Zed\TestIntegratorWirePlugin\Communication\Plugin\SinglePlugin;

class TestIntegratorDefaultConfig extends BaseConfig
{
    /**
     * @var string
     */
    public const BOOL_EXISTING_VALUE = 'false';

    /**
     * @var string
     */
    public const TEST_INTERNAL_VALUE_CHANGE = 'internal_value';

    /**
     * @var string
     */
    public const PYZ_TEST_INTERNAL_VALUE_CHANGE = 'pyz_internal_value';

    /**
     * @return string
     */
    public function testChange(): string
    {
        return 'test';
    }

    /**
     * @return string
     */
    public function testChangeMissingValue(): string
    {
        return 'test';
    }

    /**
     * @return array
     */
    public function testChange2(): array
    {
        return [
            static::TEST_VARIABLE,
        ];
    }

    /**
     * @return array
     */
    public function testChange3(): array
    {
        return [
            static::TEST_VARIABLE => static::ANOTHER_TEST_VARIABLE,
        ];
    }

    /**
     * @return array
     */
    public function testChange4(): array
    {
        return [
            static::TEST_VARIABLE => [
                static::ANOTHER_TEST_VARIABLE,
            ],
        ];
    }

    /**
     * @return array
     */
    public function testChange5(): array
    {
        return array_merge(
            parent::isCartCartItemsViaAjaxLoadEnabled(),
            parent::getSharedConfig(),
            $this->getSharedConfig2(),
        );
    }

    /**
     * @return array
     */
    public function testChange6(): array
    {
        $array = parent::isCartCartItemsViaAjaxLoadEnabledChanged();
        $array = array_merge_recursive(
            $array,
            [
                ArrayConfigElementManifestStrategy::TEST_VALUE_NOT_CHANGED,
                ArrayConfigElementManifestStrategy::TEST_VALUE2_NOT_CHANGED,
            ],
        );

        return array_merge(
            $array,
            [
                ArrayConfigElementManifestStrategy::TEST_VALUE_NOT_CHANGED => [
                    ArrayConfigElementManifestStrategy::MANIFEST_KEY_NOT_CHANGED,
                ],
                ArrayConfigElementManifestStrategy::TEST_VALUE2_NOT_CHANGED => [
                    ArrayConfigElementManifestStrategy::MANIFEST_KEY22_NOT_CHANGED,
                ],
            ],
        );
    }

    /**
     * @return array
     */
    public function testChange7(): array
    {
        return array_merge(
            parent::isCartCartItemsViaAjaxLoadEnabled(),
            [
                static::BOOL_VALUE,
            ],
        );
    }

    /**
     * @return array
     */
    public function testChange8(): array
    {
        return array_merge(
            parent::isCartCartItemsViaAjaxLoadEnabled(),
            [
                ArrayConfigElementManifestStrategy::BOOL_VALUE => [
                    ArrayConfigElementManifestStrategy::TEST_EXISTS_VALUE,
                ],
            ],
        );
    }

    /**
     * @return array
     */
    public function testChangeMethod9(): array
    {
        return [
            static::IS_CART_CART_ITEMS_VIA_AJAX_LOAD_ENABLED => false,
        ];
    }

    /**
     * @return array
     */
    public function testNotChange(): array
    {
        return array_merge(
            $array,
            [
                ArrayConfigElementManifestStrategy::TEST_NOT_CHANGE => [
                    ArrayConfigElementManifestStrategy::TEST_NOT_CHANGE,
                ],
                ArrayConfigElementManifestStrategy::TEST_NOT_CHANGE => [
                    ArrayConfigElementManifestStrategy::TEST_NOT_CHANGE,
                ],
            ],
        );
    }

    /**
     * @return array
     */
    public function testChangeArrayMerge(): array
    {
        return array_merge(
            parent::isCartCartItemsViaAjaxLoadEnabled(),
            parent::getSharedConfig(),
        );
    }

    /**
     * @return array
     */
    public function testAlreadyAddedConfigurationValue(): array
    {
        return [
            SinglePlugin::CONST_VALUE,
        ];
    }

    /**
     * @return array
     */
    public function getProtectedPaths(): array
    {
        return [
            '/categories' => [
                'isRegularExpression' => false,
            ],
            '#^/categories/.*#' => [
                'isRegularExpression' => true,
            ],
        ];
    }

    /**
     * @return array<mixed>
     */
    public function returnEmptyValueWithPreviousDefined(): array
    {
        return [100, 'text'];
    }
}
