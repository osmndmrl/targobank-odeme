
<?php

namespace Villastore\TARGOBANK\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class TARGOBANKRouteServiceProvider extends RouteServiceProvider
{
    public function map(Router $router)
    {
        // Ödeme yöntemi rotasını tanımla
        $router->get('payment/targobank', 'Villastore\TARGOBANK\Controllers\PaymentController@process');
    }
}
