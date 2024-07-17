
<?php

namespace Villastore\TARGOBANK\Services;

use Plenty\Modules\Order\Events\OrderWasCreated;

class EventService
{
    public function handleOrderCreated(OrderWasCreated $event)
    {
        // Sipariş oluşturulduğunda ödeme formunu aç
        $order = $event->getOrder();
        echo $this->generateTARGOBANKForm($order);
    }

    private function generateTARGOBANKForm($order)
    {
        // Gerekli form alanlarını doldur
        $form = '<form action="https://www.targobank.de/de/app/indirectloanrequest.html" method="POST" target="_blank">';
        $form .= '<input type="hidden" name="koop_id" value="villastore241">';
        $form .= '<input type="hidden" name="sessionID" value="' . $order->id . '">';
        $form .= '<input type="hidden" name="amount" value="' . $order->amounts[0]->invoiceTotal . '">';
        $form .= '<input type="hidden" name="dealerID" value="804625">';
        $form .= '<input type="hidden" name="dealerText" value="https://www.yourshop.com/return">';
        $form .= '<input type="hidden" name="documentno" value="' . $order->id . '">';
        $form .= '<input type="submit" value="Başvur">';
        $form .= '</form>';

        return $form;
    }
}
