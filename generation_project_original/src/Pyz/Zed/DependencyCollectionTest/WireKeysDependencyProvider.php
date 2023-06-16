<?php

namespace Pyz\Zed\DependencyCollectionTest;

use Spryker\Zed\DependencyTest\WireKeysDependencyProvider as SprykerWireKeysDependencyProvider;

class WireKeysDependencyProvider extends SprykerWireKeysDependencyProvider
{
    protected function getEventListenerPluginsWithCollectionReturnAndKeys(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber(), 'UrlStorage');

        return $collection;
    }

    protected function getEventListenerPluginsWithCollectionReturnAndLiteralKeys(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber(), 'Foo' . 'UrlStorage');

        return $collection;
    }

    protected function extendConditionPlugins(Container $container): Container
    {
        $container->extend('TEST_PLUGINS', function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection->add('Test/FooCondition', new TestFooConditionPlugin());

            return $conditionCollection;
        });

        return $container;
    }

    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithKeys(): array
    {
        $plugins = [
        ];

        return $plugins;
    }

    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithKeysAssignment(): array
    {
        $plugins = [];

        return $plugins;
    }
}
