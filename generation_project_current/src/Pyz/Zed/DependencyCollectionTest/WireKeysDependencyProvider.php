<?php

namespace Pyz\Zed\DependencyCollectionTest;

use Spryker\Zed\DependencyTest\WireKeysDependencyProvider as SprykerWireKeysDependencyProvider;

class WireKeysDependencyProvider extends SprykerWireKeysDependencyProvider
{
    protected function getEventListenerPluginsWithCollectionReturnAndKeys(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber(), 'UrlStorage');
        $collection->add(new CmsStorageEventSubscriber(), 'CmsStorage');

        return $collection;
    }

    protected function getEventListenerPluginsWithCollectionReturnAndLiteralKeys(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber(), 'Foo' . 'UrlStorage');
        $collection->add(new CmsStorageEventSubscriber(), 'Foo' . 'CmsStorage');

        return $collection;
    }

    protected function extendConditionPlugins(Container $container): Container
    {
        $container->extend('TEST_PLUGINS', function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection->add('Test/FooCondition', new TestFooConditionPlugin());
            $conditionCollection->add('Test/BarCondition', new TestBarConditionPlugin());

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
            'foo' => new FooPlugin(),
            static::BAR => new BarPlugin(),
            SharedConstants::BAZ => new BazPlugin(),
        ];

        return $plugins;
    }

    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithKeysAssignment(): array
    {
        $plugins = [];
        $plugins['foo'] = new FooPlugin();
        $plugins[static::BAR] = new BarPlugin();
        $plugins[SharedConstants::BAZ] = new BazPlugin();

        return $plugins;
    }
}
