<?php

/**
 * Controlador de Dashboard - Catalogo de Insignias Parroquia en Menu Autenticado
 * 
 * @return void
 */

require_once "models/mantenimientos/productos.model.php";

function run()
{
    $arrDataView = array();

    //Tomar productos de cada categoria
    $arrDataView["libra"] = categoriaCatalogo("LBA");
    $arrDataView["comedor"] = categoriaCatalogo("COM");
    $arrDataView["clinica"] = categoriaCatalogo("CLN");
    $arrDataView["sociales"] = categoriaCatalogo("OBS");
    $arrDataView["remodelacion"] = categoriaCatalogo("REM");
    $arrDataView["apadrinar"] = categoriaCatalogo("ESC");

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
    addToContext("cart","");

    renderizar("dashboard", $arrDataView); 
}

run();

?>
