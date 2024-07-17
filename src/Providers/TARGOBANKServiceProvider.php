
<?php

namespace Villastore\TARGOBANK\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\Order\Models\Order;

class TARGOBANKServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(TARGOBANKRouteServiceProvider::class);
    }
}
