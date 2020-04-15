<?php

/**
 * Controloador del Album de Insignias
 * 
 * @return void
 */

 require_once "models/mantenimientos/productos.model.php";
 
 function run()
 {
    $arrViewData = array();

    $usuario = $_SESSION["userCode"];

    /***** TENGO QUE MANDAR ADEMAS DEL $usuario LA CATEGORIA A BUSCAR, UN LLAMADO POR CADA CATEGORIA
           PARA HACER LO DE hasInsignia POR CADA CATEGORIA 
           Y MOSTRAR EN EL VIEW CADA CATEGORIA EN UN CICLO foreach CON EL NOMBRE DE SU LLAMADO
         ******/

    //$arrViewData["productos"] = getInsigniasAlbum($usuario); //ProductoCatalogo();
   //Tomar productos comprados de cada categoria
    $arrDataView["libra"] = getInsigniasAlbum($usuario, "LBA");
    $arrDataView["comedor"] = getInsigniasAlbum($usuario, "COM");
    $arrDataView["clinica"] = getInsigniasAlbum($usuario, "CLN");
    $arrDataView["sociales"] = getInsigniasAlbum($usuario, "OBS");
    $arrDataView["remodelacion"] = getInsigniasAlbum($usuario, "REM");
    $arrDataView["apadrinar"] = getInsigniasAlbum($usuario, "ESC");

    renderizar("infinito/album", $arrViewData); 
 }

 run();

?>