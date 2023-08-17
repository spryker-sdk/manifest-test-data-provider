<?php

namespace Pyz\Zed\DependencyCollectionTest;

use Pyz\Shared\Scheduler\SchedulerConfig;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Log\LogConstants;
use Pyz\Zed\DataImport\DataImportConfig;
use Spryker\Shared\CustomerStorage\CustomerStorageConfig;
use Spryker\Zed\DependencyTest\WireQueueDependencyProvider as SprykerWireDependencyProvider;
use Spryker\Zed\SchedulerJenkins\Communication\Plugin\Adapter\SchedulerJenkinsAdapterPlugin;
use Spryker\Zed\Synchronization\Communication\Plugin\Queue\SynchronizationStorageQueueMessageProcessorPlugin;
use Pyz\Zed\DataImportCurrency\DataImportCurrencyConfig;

class WireQueueDependencyProvider extends SprykerWireDependencyProvider
{
    /**
     * Add new method with single plugin registration
     *
     * @return \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface
     */
    protected function getSinglePlugin(): \Pyz\Zed\DependencyCollectionTest\EventDispatcherApplicationPlugin
    {
        return new \Pyz\Zed\DependencyCollectionTest\EventDispatcherApplicationPlugin();
    }

    /**
     * Plugin registration in existing method without plugins registration
     * Plugin registration with condition in existing method
     *
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPlugins(): array
    {
        $plugins = [
            new EventDispatcherApplicationPlugin(),
            new CustomerUnsubscribePlugin([
                NewsletterConstants::DEFAULT_NEWSLETTER_TYPE,
            ]),
        ];

        if (class_exists(WebProfilerApplicationPlugin::class)) {
            $plugins[] = new WebProfilerApplicationPlugin();
        }

        return $plugins;
    }

    /**
     * Plugin registration in existing method, that already contained plugin registration
     *
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularMultipleReturn(): array
    {
        return [
            new EventDispatcherApplicationPlugin(),
            new TestFooConditionPlugin(),
        ];
    }

    /**
     * Plugins registration in existing method with restrictions annotations
     *
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularReturn(): array
    {
        return [
            /**
             * Restrictions:
             * - before {@link \FQCN\EventSecondDispatcherApplicationPlugin} Optional description.
             */
            new EventFirstDispatcherApplicationPlugin(),
            /**
             * Restrictions:
             * - after {@link \FQCN\EventFirstDispatcherApplicationPlugin} Optional description.
             */
            new EventSecondDispatcherApplicationPlugin(),
            /**
             * Restrictions:
             * - after {@link \FQCN\EventFirstDispatcherApplicationPlugin} Optional description.
             * - after {@link \FQCN\EventSecondDispatcherApplicationPlugin}
             */
            new EventThirdDispatcherApplicationPlugin(),
            /**
             * Restrictions:
             * - after {@link \FQCN\EventThirdDispatcherApplicationPlugin} Optional description.
             */
            new TranslationPlugin(),
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
    protected function getSchedulerAdapterPlugins(): array
    {
        return [
            SchedulerConfig::PYZ_SCHEDULER_JENKINS => new SchedulerJenkinsAdapterPlugin(),
            Config::get(LogConstants::LOG_QUEUE_NAME) => new EventDispatcherApplicationPlugin(),
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
        return [
            CustomerStorageConfig::CUSTOMER_INVALIDATED_SYNC_STORAGE_QUEUE => new SynchronizationStorageQueueMessageProcessorPlugin(),
        ];
    }

    /**
     * Add new method with plugins registration inside of associative array
     * Plugins are added into array after array initialisation
     * Constant is used as an array key
     * Method call is used as an array key
     *
     * @return array
     */
    protected function getAssociatedArrayPlugins(): array
    {
        $dataExpanderPlugins = [];

        $dataExpanderPlugins[ProductLabelSearchConfig::PLUGIN_PRODUCT_LABEL_DATA] = new ProductLabelDataLoaderExpanderPlugin();
        $dataExpanderPlugins[ProductReviewSearchConfig::PLUGIN_PRODUCT_PAGE_RATING_DATA] = new ProductReviewDataLoaderExpanderPlugin();
        $dataExpanderPlugins[Config::get(LogConstants::LOG_QUEUE_NAME)] = new LogglyLoggerQueueMessageProcessorPlugin();

        return $dataExpanderPlugins;
    }

    /**
     * Add new method with plugin registration inside of the wrapped methods
     *
     * @return array
     */
    protected function getGrantTypeConfigurationProviderPlugins(): array
    {
        return array_merge(parent::getGrantTypeConfigurationProviderPlugins(), [
            new ProductReviewSearchConfig(),
        ]);
    }

    /**
     * Add new method with plugin registration inside of the wrapped methods
     *
     * @return array
     */
    protected function getWrappedPlugins(): array
    {
        return array_merge(
            $this->getWrappedFunctionA(),
            $this->getWrappedFunctionB(),
        );
    }

    /**
     * [Doesn't work: manifest doesn't contain the parent call information]
     * TODO: We need to fix it.
     *
     * Add new method with plugin registration inside of the wrapped methods
     * Parent method is called together with plugins registration
     *
     * @return array
     */
    protected function getWrappedPluginsWithParentCall(): array
    {
        return array_merge(
            parent::getWrappedPluginsWithParentCall(),
            $this->getWrappedFunctionC(),
        );
    }

    /**
     * [TODO] Case, that we don't cover:
     * If the parent method call was added to the function, we don't create a manifest for that
     *
     * Add new method with plugin registration inside of the wrapped methods
     * and parent method call
     *
     * @return array
     */
    protected function getWrappedPluginsWithParentCallIsAdded(): array
    {
        return array_merge(
            parent::getWrappedPluginsWithParentCall(),
            $this->getWrappedFunctionD(),
        );
    }

    /**
     * Plugin registration in wrapped function A
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
     * Plugin registration in wrapped function B
     *
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionB(): array
    {
        return [
            new TestFooConditionPlugin(),
        ];
    }

    /**
     * Plugin registration in wrapped function C
     *
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionC(): array
    {
        $dataExpanderPlugins = [
            $dataExpanderPlugins['multidimensionalWrapKey1'] = $this->wrapMultidimensionalArray1(),
        ];

        $dataExpanderPlugins[ProductLabelSearchConfig::PLUGIN_PRODUCT_LABEL_DATA] = new ProductLabelDataLoaderExpanderPlugin();
        $dataExpanderPlugins[ProductReviewSearchConfig::PLUGIN_PRODUCT_PAGE_RATING_DATA] = new ProductReviewDataLoaderExpanderPlugin();
        $dataExpanderPlugins[Config::get(LogConstants::LOG_QUEUE_NAME)] = new LogglyLoggerQueueMessageProcessorPlugin();
        $dataExpanderPlugins[] = $this->wrapMultidimensionalArray2();
        $dataExpanderPlugins['multidimensionalWrapKey3'] = $this->wrapMultidimensionalArray3();

        return $dataExpanderPlugins;
    }

    /**
     * Plugin registration in wrapped function D
     *
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionD(): array
    {
        return [
            new TestFooBarPlugin2(),
        ];
    }

    /**
     * @return array
     */
    protected function getWrappedFunctionArrayMergeExtension(): array
    {
        return array_merge(
            $this->getWrappedFunctionE(),
            ['indexKey' => $this->getWrappedFunctionF()],
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
     * @return EventDispatcherApplicationPlugin[]
     */
    protected function getWrappedFunctionF(): array
    {
        return [
            'key' => new TestFooBarPlugin2(),
        ];
    }

    /**
     * Plugin registration in existing method with collection
     *
     * @return Collection
     */
    protected function wrapMultidimensionalArray1(): array
    {
        return [
            'key1' => new Plugin1(),
            'key2' => new Plugin2(),
        ];
    }

    protected function wrapMultidimensionalArray2(): array
    {
        return [
            new Plugin3(),
        ];
    }

    protected function wrapMultidimensionalArray3(): array
    {
        return [
            'key4' => new Plugin4(),
        ];
    }

    protected function getEventListenerPluginsWithCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber());
        $collection->add(new AvailabilityStorageEventSubscriber());

        return $collection;
    }

    /**
     * Plugin registration in existing method with collection with chain call of plugin registration
     *
     * @return Collection
     */
    protected function getEventListenerPluginsWithChainedCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection
            ->add(new UrlStorageEventSubscriber())
            ->add(new FooStorageEventSubscriber())
            ->add(new AvailabilityStorageEventSubscriber());

        return $collection;
    }

    /**
     * Plugin registration in existing method with container
     *
     * @param Container $container
     * @return Container
     */
    protected function extendConditionPlugins(Container $container): Container
    {
        $container->extend('TEST_PLUGINS', function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection->add(new TestFooConditionPlugin());
            $conditionCollection->add(new TestBarConditionPlugin());

            return $conditionCollection;
        });

        return $container;
    }

    /**
     * Console commands registration with the same name, but different constructor arguments
     *
     * @param Container $container
     * @return array
     */
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [
            new CacheWarmerConsole(),
            new BuildNavigationConsole(new PluginParam()),
            new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_STORE),
            new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportCurrencyConfig::IMPORT_TYPE_CURRENCY),
        ];

        return $commands;
    }
}
