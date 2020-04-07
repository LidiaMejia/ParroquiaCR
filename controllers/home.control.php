<?php


require_once "models/mantenimientos/productos.model.php";

function run()
{
    $arrDataView = array();
    $arrDataView["productos"] = productoCatalogo();
    renderizar("home",Array());
}
  run();
?>
