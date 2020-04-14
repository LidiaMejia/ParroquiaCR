<?php

require_once 'libs/paypal.php';


function createPaypalTransacction( $_amount , $_items )
{
    $apiContext = getApiContext();
    $payer = new \PayPal\Api\Payer();
    $payer->setPaymentMethod('paypal');

    $items = new \PayPal\Api\ItemList();
    $_amount = 0 ;
    foreach ($_items as $_item) {
        $item = new \PayPal\Api\Item();
        $item->setSku($_item["skuprd"]);
        $item->setName($_item["dscprd"]);
        $item->setQuantity($_item["crrctd"]);
        $item->setPrice($_item["crrprc"]);
        $_amount += floatval($_item["total"]);
        $item->setCurrency('USD');
        $items->addItem($item);
    }

    $amount = new \PayPal\Api\Amount();
    $amount->setTotal(strval($_amount));
    $amount->setCurrency('USD');

    $transaction = new \PayPal\Api\Transaction();
    $transaction->setAmount($amount);
    $transaction->setNoteToPayee("Orden de Compra");
    $transaction->setItemList($items);

    $redirectUrls = new \PayPal\Api\RedirectUrls();
    //CAMBIAR ESTA DIRECCION URL------------------------------------------------------------------
    $redirectUrls
        ->setReturnUrl("http://localhost/mvc/index.php?page=checkoutapr")
        ->setCancelUrl("http://localhost/mvc/index.php?page=checkoutcnl");

    $payment = new \PayPal\Api\Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);

    try {
        $payment->create($apiContext);
        //Importante para saber que trasacción y guardarlo en la base de datos
        $_SESSION["paypalTrans"] = $payment;
        return $payment->getApprovalLink();
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        error_log($ex->getData());
        return false;
    }
}

function executePaypal()
{
    if (isset($_GET['PayerID'])) {
        $apiContext = getApiContext();

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        try {
           
            $result = $payment->execute($execution, $apiContext);
            
          
            try {
                $payment = Payment::get($paymentId, $apiContext);
            } catch (Exception $ex) {
                error_log($ex);
                return false;
            }
        } catch (Exception $ex) {
            error_log($ex);
        }
        return $payment;
    } else {
        error_log("Usuario Ha Cancelado Su Transaccion");
        return false;
    }
}

?>