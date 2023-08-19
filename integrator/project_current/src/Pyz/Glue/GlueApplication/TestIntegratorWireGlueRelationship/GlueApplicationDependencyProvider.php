<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Pyz\Glue\GlueApplication\TestIntegratorWireGlueRelationship;

use Spryker\Glue\GlueApplication\ResourceRelationshipCollectionInterface;
use Spryker\Glue\TestIntegratorUnwireGlueRelationship\Plugin\UnwireGlueRelationshipPlugin;
use Spryker\Glue\TestIntegratorUnwireGlueRelationship\UnwireGlueRelationshipConfig;

class GlueApplicationDependencyProvider
{
    /**
     * @param \Spryker\Glue\GlueApplication\ResourceRelationshipCollectionInterface $resourceRelationshipCollection
     *
     * @return \Spryker\Glue\GlueApplication\ResourceRelationshipCollectionInterface
     *
     * // $resourceRelationshipCollection->addRelationship(UnwireGlueRelationshipConfig::TEST_ITEMS_UNWIRE, new UnwireGlueRelationshipPlugin());
     */
    protected function getResourceRelationshipPlugins(
        ResourceRelationshipCollectionInterface $resourceRelationshipCollection
    ): ResourceRelationshipCollectionInterface {
        $resourceRelationshipCollection->addRelationship(UnwireGlueRelationshipConfig::TEST_ITEMS_UNWIRE, new UnwireGlueRelationshipPlugin());

        return $resourceRelationshipCollection;
    }
}
