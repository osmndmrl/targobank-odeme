
<?php

namespace Villastore\TARGOBANK\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Villastore\TARGOBANK\Services\OrderService;

class PaymentController extends Controller
{
    public function process(Request $request, Response $response)
    {
        // Sipariş bilgilerini al
        $orderId = $request->get('orderId');
        $orderService = pluginApp(OrderService::class);
        $order = $orderService->getOrderById($orderId);

        // TARGOBANK formunu oluştur
        $form = $this->generateTARGOBANKForm($order);

        // Formu döndür
        return $response->json(['form' => $form]);
    }

    private function generateTARGOBANKForm($order)
    {
        // Gerekli form alanlarını doldur
        $form = '<form action="https://www.targobank.de/de/app/indirectloanrequest.html" method="POST" target="_blank">';
        $form .= '<input type="hidden" name="koop_id" value="villastore241">';
        $form .= '<input type="hidden" name="sessionID" value="' . $order->id . '">';
        $form .= '<input type="hidden" name="amount" value="' . $order->amounts[0]->invoiceTotal . '">';
        $form .= '<input type="hidden" name="dealerID" value="804625">';
        $form .= '<input type="hidden" name="dealerText" value="https://www.villamoebel.de/return">';
        $form .= '<input type="hidden" name="documentno" value="' . $order->id . '">';
        $form .= '<input type="submit" value="Başvur">';
        $form .= '</form>';

        return $form;
    }
}
