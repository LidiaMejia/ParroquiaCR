<?php

/**
 * Controlador Pagina Servicios
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Servicios";
    addJsRef("public/js/main.js");

    renderizar("parroquia/servicios", $arrViewData); 
 }  

 run();

?>