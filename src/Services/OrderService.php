
<?php

namespace Villastore\TARGOBANK\Services;

use Plenty\Modules\Order\Models\Order;

class OrderService
{
    public function updateOrderStatus($orderId, $status)
    {
        // Sipariş durumunu güncelle
        $order = Order::find($orderId);
        $order->status = $status;
        $order->save();
    }
}
