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

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("nosotros","");
    addToContext("sacramentos","");
    addToContext("dimensiones","");
    addToContext("pastorales","");
    addToContext("plataforma","");
    addToContext("servicios","");
    addToContext("home","active");
    addToContext("login","");
    addToContext("register","");

    renderizar("home", $arrDataView); 
}

run();

?>
