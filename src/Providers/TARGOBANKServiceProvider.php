
<?php

namespace Villastore\TARGOBANK\Providers;

use Plenty\Plugin\ServiceProvider;

class TARGOBANKServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(TARGOBANKRouteServiceProvider::class);
    }
}
