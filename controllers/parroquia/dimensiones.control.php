<?php

/**
 * Controlador Pagina dimensiones
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Dimensiones";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/dimensiones", $arrViewData);
 }  

 run();

?>