<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TestIntegratorDefault;

class BaseConfig extends AbstractConfig
{
    protected const BOOL_VALUE = true;

    /**
     * @return string[]
     */
    public function getAllowedLanguages() : array
    {
        return [
            'de',
        ];
    }
    
    /**
     * @return int
     */
    protected function getNumber() : int
    {
        return 10;
    }

    public function getStoreSynchronizationPoolName() : ?string
    {
        return null;
    }
}
