<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\GlueApplication;

use Spryker\Glue\GlueApplication\GlueApplicationDependencyProvider as SprykerGlueApplicationDependencyProvider;
use Spryker\Glue\ShoppingListsRestApi\ShoppingListsRestApiConfig;
/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
class GlueApplicationDependencyProvider extends SprykerGlueApplicationDependencyProvider
{
    /**
     * @return array<\Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ConventionPluginInterface>
     */
    protected function getConventionPlugins(): array
    {
        return [];
    }

    /**
     * @param Collection $resourceRelationshipCollection
     * @return Collection
     */
    protected function getResourceRelationshipPlugins(
        Collection $resourceRelationshipCollection
    ): Collection
    {
        $resourceRelationshipCollection->addRelationship(
            ShoppingListsRestApiConfig::RESOURCE_SHOPPING_LIST_ITEMS,
            new TestFooConditionPlugin(),
        );

        return $resourceRelationshipCollection;
    }
}
