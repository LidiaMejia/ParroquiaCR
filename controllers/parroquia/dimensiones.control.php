<?php

/**
 * Controlador Pagina dimensiones
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "dimensiones";
    addJsRef("public/js/main.js");

    renderizar("parroquia/dimensiones", $arrViewData);
 }  

 run();

?>