<?php

namespace Spryker\Zed\TestIntegratorWirePlugin\Expander;

interface ContextExpanderCollectionInterface
{
    public function addApplication(ContextPluginInterface $plugin);

    public function addExpander(ContextExpanderPluginInterface $plugin);
}
