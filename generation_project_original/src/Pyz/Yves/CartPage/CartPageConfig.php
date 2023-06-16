<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CartPage;

use App\Manifest\Generator\ArrayConfigElementManifestStrategy;
use SprykerShop\Yves\CartPage\CartPageConfig as SprykerCartPageConfig;

class CartPageConfig extends SprykerCartPageConfig
{
    /**
     * @var array<int>
     */
    protected const CHANGE_EXISTING_VALUES = [
        10,
    ];

    /**
     * @project
     *
     * @return array
     */
    public function testExistsProjectMethod(): array
    {
        array_merge(parent::isCartCartItemsViaAjaxLoadEnabled(), [
            'test' . 'test',
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ]);

        return array_merge(parent::isCartCartItemsViaAjaxLoadEnabled(), [
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ]);
    }

    /**
     * @return string
     */
    public function testChange(): string
    {
        return static::TEST_VALUE;
    }

    /**
     * @return array
     */
    public function testChange2(): array
    {
        return [
            static::TEST_VALUE,
            static::TEST_VALUE2,
            static::TEST_VALUE3,
        ];
    }

    /**
     * @return array
     */
    public function testChange3(): array
    {
        return [
            static::TEST_VALUE => static::TEST_VALUE2,
            static::TEST_VALUE2 => static::TEST_VALUE3,
            static::TEST_VALUE3 => static::TEST_VALUE5,
        ];
    }

    /**
     * @return array
     */
    public function testChange4(): array
    {
        return [
            static::TEST_VALUE => [
                static::TEST_VALUE2
            ],
            static::TEST_VALUE2 => [
                static::TEST_VALUE3
            ],
            static::TEST_VALUE3 => static::TEST_VALUE5,
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
        );
    }

    /**
     * @return array
     */
    public function testChange6(): array
    {
        $array = [
            static::TEST_VARIABLE,
        ];

        return array_merge(
            $array,
            parent::isCartCartItemsViaAjaxLoadEnabled(),
            parent::getSharedConfig(),
        );
    }

    /**
     * @return array
     */
    public function testChangeArrayMerge(): array
    {
        return array_merge(
            $this->getSharedConfig(),
        );
    }

    /**
     * @return array
     */
    public function testChangeArrayMerge2(): array
    {
        return array_merge(
            $this->getSharedConfig(),
            [
                ArrayConfigElementManifestStrategy::ALREADY_EXISTS_VARIABLE,
            ]
        );
    }

    /**
     * @return array
     */
    public function testChangeArrayMerge3(): array
    {
        return array_merge(
            $this->getSharedConfig(),
            [
                ArrayConfigElementManifestStrategy::ALREADY_EXISTS_VARIABLE => [
                    parent::TEST_EXIST_VARIABLE,
                ],
            ]
        );
    }

    /**
     * @return array[]
     */
    public function getProtectedPaths(): array
    {
        return [
            '/categories' => [
                'isRegularExpression' => false,
            ],
            '/\/product-test.*/' => [
                'isRegularExpression' => true,
                'methods' => [
                    'post',
                ],
            ],
        ];
    }
}
