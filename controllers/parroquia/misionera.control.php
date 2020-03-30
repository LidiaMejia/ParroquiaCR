<?php

/**
 * Controlador Pagina Dimension Misionera
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Dimensión Misionera";
    addJsRef("public/js/main.js");

    renderizar("parroquia/misionera", $arrViewData);
 }  

 run();

?>