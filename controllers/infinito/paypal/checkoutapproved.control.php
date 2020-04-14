<?php
/**
 * Controlador cuando paypal manda una aprobación del usuario
 * se debe  procesar el pago ejecutandolo y creando la factura
 *
 * @return void
 */


require_once 'libs/paypal.php';

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;



function run()
{

    $payment = executePaypal();
    $viewData = array();
    $usuario = $_SESSION["userCode"];
    if ($payment) {
        if (crearFactura($usuario, $payment->toJSON())) {

            //Se obtiene la factura generada

            addToContext("cartEntries", 0);
            $viewData["payment"] = $payment->toJSON();
            $viewData["checkoutTitle"]
                = $payment->getPayer()
                ->getPayerInfo()
                ->getFirstName().
                " ".
                $payment->getPayer()
                ->getPayerInfo()
                ->getLastName();
            $viewData["checkoutDescription"] = "";
            $viewData["error"] =  "";
            $viewData["amount"]
                = $payment->getTransactions()[0]
                ->getAmount()
                ->getTotal();
        }
    } else {
        $viewData["error"] = "Error al procesar pagos";
    }
    renderizar("infinito/paypal/checkoutapproved", $viewData);
}

run();

/**
 * Ejecuta el pago en paypal
 *
 * @return void
 */
function executePaypal()
{
    if (isset($_GET['PayerID'])) {

        //Pasa un objeto ApiContext para autenticar

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
        error_log("Usuario cancelo la transacción ");
        return false;
    }
}
?>
