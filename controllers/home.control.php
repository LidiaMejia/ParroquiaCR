<?php

/**
 * Controlador de Home - Catalogo de Insignias Parroquia
 * 
 * @return void
 */

require_once "models/mantenimientos/productos.model.php";

function run()
{
    $arrDataView = array();
    $arrDataView["productos"] = productoCatalogo();

    renderizar("home", $arrDataView); 
}

run();

?>
