<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CartPage;

use App\Manifest\Generator\ArrayConfigElementManifestStrategy;
use Generated\Shared\Transfer\ProductConfigurationInstanceTransfer;
use SprykerShop\Yves\CartPage\CartPageConfig as SprykerCartPageConfig;
use SprykerShop\Zed\Kernel\Container;

class CartPageConfig extends SprykerCartPageConfig
{
    /**
     * @var array<int>
     */
    protected const CHANGE_EXISTING_VALUES = [
        10,
        100,
    ];

    /**
     * @var array<int>
     */
    protected const ARRAY_VALUE = [10, 1000];

    /**
     * @var array<string, string>
     */
    protected const ASSOC_ARRAY_VALUE = [
        'key_1' => 'key_1_value',
        'key_2' => 'key_2_value',
    ];

    /**
     * @var bool
     */
    protected const BOOL_VALUE = true;

    /**
     * @var int
     */
    protected const INT_VALUE = 10;

    /**
     * @var string
     */
    protected const STRING_NULL_VALUE = 'null';

    /**
     * @var int|null
     */
    protected const NULL_VALUE = null;

    /**
     * @project
     *
     * @return array
     */
    public function testNewProjectMethod(): array
    {
        array_merge(parent::isCartCartItemsViaAjaxLoadEnabled(), [
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ]);

        return array_merge(parent::isCartCartItemsViaAjaxLoadEnabled(), [
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ]);
    }

    /**
     * @project
     *
     * @return array
     */
    public function testExistsProjectMethod(): array
    {
        array_merge(parent::isCartCartItemsViaAjaxLoadEnabled(), [
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ]);

        return array_merge(parent::isCartCartItemsViaAjaxLoadEnabled(), [
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ]);
    }

    /**
     * @return array
     */
    public function testNewMethod(): array
    {
        return array_merge(parent::isCartCartItemsViaAjaxLoadEnabled(), [
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ]);
    }

    /**
     * @return array
     */
    public function testNewMethod2(): array
    {
        return array_merge(
            parent::isCartCartItemsViaAjaxLoadEnabled(),
            parent::getSharedConfig(),
        );
    }

    /**
     * @return string
     */
    public function testNewMethod3(): string
    {
        return ArrayConfigElementManifestStrategy::MANIFEST_KEY;
    }

    /**
     * @return array
     */
    public function testNewMethod4(): array
    {
        return [
            ArrayConfigElementManifestStrategy::MANIFEST_KEY,
            ArrayConfigElementManifestStrategy::MANIFEST_KEY,
            static::TEST_VALUE3,
        ];
    }

    /**
     * @return array
     */
    public function testNewMethod5(): array
    {
        return [
            ArrayConfigElementManifestStrategy::MANIFEST_KEY => ArrayConfigElementManifestStrategy::TEST_VALUE2,
            static::TEST_VALUE2 => static::TEST_VALUE3,
            static::TEST_VALUE3 => static::TEST_VALUE5,
        ];
    }

    /**
     * @return array
     */
    public function testNewMethod6(): array
    {
        return $this->get(ConsoleConstants::ENABLE_DEVELOPMENT_CONSOLE_COMMANDS, false);
    }

    /**
     * @return array
     */
    public function testNewMethod7(): array
    {
        return parent::get(ConsoleConstants::ENABLE_DEVELOPMENT_CONSOLE_COMMANDS, false);
    }

    /**
     * @return bool
     */
    public function testNewMethod8(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function testNewMethod9(): bool
    {
        return false;
    }

    /**
     * @return array
     */
    public function testNewMethod10(): array
    {
        return $this->getSharedConfig(
            $test,
            [
                CartPageConfig::IS_CART_CART_ITEMS_VIA_AJAX_LOAD_ENABLED => [
                    CartPageConfig::IS_CART_CART_ITEMS_VIA_AJAX_LOAD_ENABLED => 'test'
                ],
            ]
        );
    }

    /**
     * @return array
     */
    public function testNewMethod11(): array
    {
        return static::getSharedConfig(
            $test,
            [
                CartPageConfig::IS_CART_CART_ITEMS_VIA_AJAX_LOAD_ENABLED => [
                    CartPageConfig::IS_CART_CART_ITEMS_VIA_AJAX_LOAD_ENABLED => 'test'
                ],
            ]
        );
    }

    /**
     * @return array
     */
    public function testNewMethod12(): array
    {
        $paymentMethodStatemachineMapping = $this->getPaymentMethodStatemachineMapping();

        if (!array_key_exists($quoteTransfer->getPayment()->getPaymentSelection(), $paymentMethodStatemachineMapping)) {
            return parent::determineProcessForOrderItem($quoteTransfer, $itemTransfer);
        }

        return $paymentMethodStatemachineMapping[$quoteTransfer->getPayment()->getPaymentSelection()];
    }

    /**
     * @return string
     */
    public function testChange(): string
    {
        return static::TEST_VALUE_CHANGE;
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
            static::TEST_VALUE4_CHANGE,
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
            static::TEST_VALUE_CHANGE => static::TEST_VALUE5_CHANGE,
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
            static::TEST_VALUE6 => [
                ArrayConfigElementManifestStrategy::TEST_VALUE5
            ],
            static::TEST_VALUE7 => [
                ArrayConfigElementManifestStrategy::TEST_VALUE3 => ArrayConfigElementManifestStrategy::MANIFEST_KEY,
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
        $array = array_merge($array, [
            ArrayConfigElementManifestStrategy::TEST_VALUE,
            ArrayConfigElementManifestStrategy::TEST_VALUE2,
        ]);

        return array_merge($array, [
            ArrayConfigElementManifestStrategy::TEST_VALUE => [
                ArrayConfigElementManifestStrategy::MANIFEST_KEY
            ],
            ArrayConfigElementManifestStrategy::TEST_VALUE2 => [
                ArrayConfigElementManifestStrategy::MANIFEST_KEY22
            ],
        ]);
    }

    /**
     * @return array
     */
    public function testChangeArrayMerge(): array
    {
        return array_merge(
            $this->getSharedConfig(),
            $this->getSharedConfigNew(),
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
                parent::TEST_VARIABLE,
                $this->getTestVariable(),
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
                ArrayConfigElementManifestStrategy::ALREADY_EXISTS_VARIABLE2 => [
                    parent::TEST_EXIST_VARIABLE2,
                ],
            ]
        );
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

    /**
     * @return array
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
            '/\/product-attributes.*/' => [
                'isRegularExpression' => true,
                'methods' => [
                    'get',
                    'getCollection',
                    'post',
                    'patch',
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function returnStringConstant(): string
    {
        return 'PHP_EOL';
    }

    /**
     * @return string
     */
    public function returnConstant(): string
    {
        return PHP_EOL;
    }

    /**
     * @return array
     */
    public function getAllowedLanguages(): array
    {
        return (new Container())->getLocator()->locale()->client()->getAllowedLanguages();
    }
}
