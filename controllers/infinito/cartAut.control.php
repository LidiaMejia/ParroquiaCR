<?php

/**
 * Controlador de  carretilla de compra autenticada
 * 
 * @return void
 */

require_once "models/mantenimientos/productos.model.php";

function run()
{
    $usuario = $_SESSION["userCode"];

    $arrDataView = array();
    $arrDataView = getAuthCartDetail($usuario);

    renderizar("infinito/cart", $arrDataView);
}

run();

?>