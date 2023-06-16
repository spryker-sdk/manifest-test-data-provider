<?php

namespace Pyz\Zed\DependencyCollectionTest;

use Spryker\Zed\DependencyTest\WireNoFileDependencyProvider as SprykerWireDependencyProvider;

class WireNoFileDependencyProvider extends SprykerWireDependencyProvider
{
    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPlugins(): array
    {
        $plugins = [
            new EventDispatcherApplicationPlugin(),
        ];

        return $plugins;
    }

    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularReturn(): array
    {
        return [
            new EventDispatcherApplicationPlugin(),
        ];
    }

    protected function getEventListenerPluginsWithCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber());

        return $collection;
    }

    protected function getEventListenerPluginsWithChainedCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection
            ->add(new UrlStorageEventSubscriber())
            ->add(new AvailabilityStorageEventSubscriber());

        return $collection;
    }

    protected function extendConditionPlugins(Container $container): Container
    {
        $container->extend('TEST_PLUGINS', function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection->add(new TestFooConditionPlugin());

            return $conditionCollection;
        });

        return $container;
    }
}
