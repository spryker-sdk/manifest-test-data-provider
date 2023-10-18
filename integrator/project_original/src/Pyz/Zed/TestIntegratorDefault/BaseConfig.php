<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Pyz\Zed\TestIntegratorDefault;

class BaseConfig extends AbstractConfig
{
    /**
     * @var bool
     */
    protected const BOOL_VALUE = true;


    /**
     * @var string
     */
    public const TEST_EXTERNAL_CONFIG = 'TEST_EXTERNAL_CONFIG';

    /**
     * @var string
     */
    public const PYZ_TEST_EXTERNAL_CONFIG = 'PYZ_TEST_EXTERNAL_CONFIG';

    /**
     * @return string[]
     */
    public function getAllowedLanguages(): array
    {
        return [
            'de',
        ];
    }

    /**
     * @return int
     */
    protected function getNumber(): int
    {
        return 10;
    }

    public function getStoreSynchronizationPoolName(): ?string
    {
        return null;
    }
}
