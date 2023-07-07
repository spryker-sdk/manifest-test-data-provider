<?php

namespace Pyz\Zed\DependencyCollectionTest;

use Spryker\Zed\DependencyTest\UnwireQueueDependencyProvider as SprykerUnwireDependencyProvider;

class UnwireQueueDependencyProvider extends SprykerUnwireDependencyProvider
{
    /**
     * Scenario:
     *
     * Remove the plugin registration from the array, that is merged with
     * the parent method call inside of array_merge().
     *
     * @return array
     */
    protected function getGrantTypeConfigurationProviderPlugins(): array
    {
        return array_merge(parent::getGrantTypeConfigurationProviderPlugins(), []);
    }

    /**
     * Scenario:
     *
     * Remove plugin, registered by array initialisation
     * Remove plugin, that was added to existing array with condition check
     *
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPlugins(): array
    {
        $plugins = [
        ];

        return $plugins;
    }

    /**
     * Scenario:
     *
     * Remove plugin, registered by array initialisation
     *
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularReturn(): array
    {
        return [
        ];
    }

    /**
     * Scenario:
     *
     * Remove one of the plugins, registered by array initialisation
     *
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularMultipleReturn(): array
    {
        return [
            new SessionApplicationPlugin(),
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
     * Scenario:
     *
     * Remove one of the wrap methods, that were called in array_merge()
     *
     * @return array
     */
    protected function getWrappedPlugins(): array
    {
        return array_merge(
            $this->getWrappedFunctionA(),
        );
    }

    /**
     * [TODO] Case, that we don't cover:
     * If the parent method call was removed from the function, we don't create a manifest for that
     *
     * Scenario:
     *
     * Remove parent method call from existing method, that was called in array_merge()
     *
     * @return array
     */
    protected function getWrappedPluginsWithParentCall(): array
    {
        return array_merge(
            $this->getWrappedFunctionC(),
        );
    }

    /**
     * Plugin registration in wrapped function in indexed array
     *
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionA(): array
    {
        return [
            new EventDispatcherApplicationPlugin(),
        ];
    }

    /**
     * Plugin registration in wrapped function in indexed array
     *
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionC(): array
    {
        return [
            new Plugin1(),
        ];
    }

    /**
     * Scenario:
     *
     * Remove plugin registrations, that were added to an associative array as new elements
     *
     * @return array
     */
    protected function getAssociatedArrayPlugins(): array
    {
        $dataExpanderPlugins = [];

        return $dataExpanderPlugins;
    }

    /**
     * Scenario:
     *
     * Remove plugin registration, that was added to collection
     *
     * @return Collection
     */
    protected function getEventListenerPluginsWithCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber());

        return $collection;
    }

    /**
     * Scenario:
     *
     * Remove plugin registration, that was added to collection in chain
     *
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
     * Scenario:
     *
     * Remove plugin registration, that was added to container
     *
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
}
