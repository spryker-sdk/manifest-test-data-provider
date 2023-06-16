<?php

namespace Pyz\Zed\DependencyCollectionTest;

use Pyz\Shared\Scheduler\SchedulerConfig;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Log\LogConstants;
use Spryker\Zed\DependencyTest\UnwireDefaultDependencyProvider as SprykerUnwireDependencyProvider;
use Spryker\Zed\SchedulerJenkins\Communication\Plugin\Adapter\SchedulerJenkinsAdapterPlugin;
use Pyz\Zed\DataImport\DataImportConfig;
use Spryker\Zed\Synchronization\Communication\Plugin\Queue\SynchronizationStorageQueueMessageProcessorPlugin;

class UnwireQueueDependencyProvider extends SprykerUnwireDependencyProvider
{
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

    protected function getGrantTypeConfigurationProviderPlugins(): array
    {
        return array_merge(parent::getGrantTypeConfigurationProviderPlugins(), [
            new ProductReviewSearchConfig(),
        ]);
    }

    /**
     * @param \Pyz\Zed\DependencyCollectionTest\Container $container
     *
     * @return array
     */
    protected function getConsoleCommands(Container $container): array
    {
        $commands = [
            new CacheWarmerConsole(),
            new BuildNavigationConsole(),
            new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_STORE),
            new DataImportConsole(DataImportConfig::ANY_NAME . ':' . DataImportConfig::IMPORT_TYPE_CURRENCY),
        ];

        return $commands;
    }

    /**
     * @return \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface
     */
    protected function getSinglePlugin(): \Pyz\Zed\DependencyCollectionTest\EventDispatcherApplicationPlugin
    {
        return new \Pyz\Zed\DependencyCollectionTest\EventDispatcherApplicationPlugin();
    }

    /**
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
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularReturn(): array
    {
        return [
            new EventDispatcherApplicationPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface>
     */
    protected function getBackofficeApplicationPluginsWithRegularMultipleReturn(): array
    {
        return [
            new SessionApplicationPlugin(),
            new TestFooConditionPlugin(),
        ];
    }

    protected function getSchedulerAdapterPlugins(): array
    {
        return [
            SchedulerConfig::PYZ_SCHEDULER_JENKINS => new SchedulerJenkinsAdapterPlugin(),
            Config::get(LogConstants::LOG_QUEUE_NAME) => new TestFooConditionPlugin(),
            $this->getWrappedFunctionC(),
            'wrapKey' => $this->getWrappedFunctionD(),
        ];
    }

    protected function getWrappedPlugins(): array
    {
        return array_merge(
            $this->getWrappedFunctionA(),
            $this->getWrappedFunctionB(),
        );
    }

    protected function getWrappedPluginsWithParentCall(): array
    {
        return array_merge(
            parent::getWrappedPluginsWithParentCall(),
            $this->getWrappedFunctionC(),
        );
    }

    protected function getWrappedFunctionA(): array
    {
        return [
            new EventDispatcherApplicationPlugin(),
        ];
    }

    protected function getWrappedFunctionB(): array
    {
        return [
            new TestFooConditionPlugin(),
        ];
    }

    protected function getWrappedFunctionC(): array
    {
        return [
            new Plugin1(),
        ];
    }

    protected function getWrappedFunctionD(): array
    {
        return [
            'idx' => new Plugin2(),
        ];
    }

    protected function getAssociatedArrayPlugins(): array
    {
        $dataExpanderPlugins = [];

        $dataExpanderPlugins[ProductLabelSearchConfig::PLUGIN_PRODUCT_LABEL_DATA] = new ProductLabelDataLoaderExpanderPlugin();
        $dataExpanderPlugins[ProductReviewSearchConfig::PLUGIN_PRODUCT_PAGE_RATING_DATA] = new ProductReviewDataLoaderExpanderPlugin();
        $dataExpanderPlugins[Config::get(LogConstants::LOG_QUEUE_NAME)] = new LogglyLoggerQueueMessageProcessorPlugin();

        return $dataExpanderPlugins;
    }

    protected function getEventListenerPluginsWithCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection->add(new UrlStorageEventSubscriber());
        $collection->add(new AvailabilityStorageEventSubscriber());

        return $collection;
    }

    protected function getEventListenerPluginsWithChainedCollectionReturn(): Collection
    {
        $collection = new Collection();

        $collection
            ->add(new UrlStorageEventSubscriber())
            ->add(new FooStorageEventSubscriber())
            ->add(new AvailabilityStorageEventSubscriber());

        return $collection;
    }

    protected function extendConditionPlugins(Container $container): Container
    {
        $container->extend('TEST_PLUGINS', function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection->add(new TestFooConditionPlugin());
            $conditionCollection->add(new TestBarConditionPlugin());

            return $conditionCollection;
        });

        return $container;
    }
}
