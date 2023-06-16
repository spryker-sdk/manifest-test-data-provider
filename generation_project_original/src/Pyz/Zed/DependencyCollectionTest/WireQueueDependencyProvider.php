<?php

namespace Pyz\Zed\DependencyCollectionTest;

use Spryker\Zed\DependencyTest\WireQueueDependencyProvider as SprykerWireDependencyProvider;

class WireQueueDependencyProvider extends SprykerWireDependencyProvider
{
    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPlugins(): array
    {
        $plugins = [
        ];

        return $plugins;
    }

    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularReturn(): array
    {
        return [
        ];
    }

    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularMultipleReturn(): array
    {
        return [
            new EventDispatcherApplicationPlugin(),
        ];
    }

    /**
     * @return array
     */
    protected function getWrappedPluginsWithParentCallIsAdded(): array
    {
        return array_merge(
            $this->getWrappedFunctionD(),
        );
    }

    /**
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionD(): array
    {
        return [
            new TestFooBarPlugin2(),
        ];
    }

    /**
     * Add new method with plugins registration inside of associative array
     * Plugins are registered during array initialisation
     * Constant is used as an array key
     * Method call is used as an array key
     *
     * @return array
     */
    protected function getProcessorMessagePlugins(): array
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getWrappedFunctionArrayMergeExtension(): array
    {
        return array_merge(
            $this->getWrappedFunctionE()
        );
    }

    /**
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionE(): array
    {
        return [
            new TestFooBarPlugin2(),
        ];
    }

    /**
     * @return Collection
     */
    protected function getEventListenerPluginsWithCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber());

        return $collection;
    }

    /**
     * @return Collection
     */
    protected function getEventListenerPluginsWithChainedCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection
            ->add(new UrlStorageEventSubscriber())
            ->add(new AvailabilityStorageEventSubscriber());

        return $collection;
    }

    /**
     * @param Container $container
     * @return Container
     */
    protected function extendConditionPlugins(Container $container): Container
    {
        $container->extend('TEST_PLUGINS', function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection->add(new TestFooConditionPlugin());

            return $conditionCollection;
        });

        return $container;
    }

    /**
     * @param Container $container
     * @return array
     */
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [];

        return $commands;
    }
}
