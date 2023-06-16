<?php
/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Glue\DocumentationGeneratorApi;
use Spryker\Glue\DocumentationGeneratorApi\DocumentationGeneratorApiDependencyProvider as SprykerDocumentationGeneratorApiDependencyProvider;
use Spryker\Glue\GlueApplication\Plugin\DocumentationGeneratorApi\RestApiSchemaFormatterPlugin;
class DocumentationGeneratorApiDependencyProvider extends SprykerDocumentationGeneratorApiDependencyProvider
{
    /**
     * @return array<\Spryker\Glue\DocumentationGeneratorApiExtension\Dependency\Plugin\SchemaFormatterPluginInterface>
     */
    protected function getSchemaFormatterPlugins(): array
    {
        return [
            new RestApiSchemaFormatterPlugin(),
        ];
    }
}
