<?php

/**
 * Controlador Pagina Principal Pastorales
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Pastorales";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/pastorales", $arrViewData); 
 }  

 run();

?>