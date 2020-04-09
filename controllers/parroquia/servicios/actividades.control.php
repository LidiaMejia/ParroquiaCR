<?php

/**
 * Controlador Pagina Servicios Actividades Liturgicas
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Actividades";
    
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/servicios/actividades", $arrViewData);
 }  

 run();

?>