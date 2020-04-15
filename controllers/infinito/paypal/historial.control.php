<?php

/**
 * Controlador para el Historial de las Transacciones (Ventas) realizadas
 * 
 * @return void
 */

require_once "models/mantenimientos/productos.php";

function run()
{
    $arrViewData = array();

    renderizar("infinito/paypal/historial", $arrViewData);
}

run();

?>