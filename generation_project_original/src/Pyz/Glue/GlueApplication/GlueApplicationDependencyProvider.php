<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\GlueApplication;

use Spryker\Glue\GlueRestApiConvention\Plugin\GlueApplication\RestConventionPlugin;
use Spryker\Glue\ProductsRestApi\ProductsRestApiConfig;
use Spryker\Glue\GlueApplication\GlueApplicationDependencyProvider as SprykerGlueApplicationDependencyProvider;
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
        return [
            new RestConventionPlugin(),
        ];
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
            ProductsRestApiConfig::RESOURCE_ABSTRACT_PRODUCTS,
            new RestConventionPlugin(),
        );

        return $resourceRelationshipCollection;
    }
}
