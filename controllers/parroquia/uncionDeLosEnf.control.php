<?php

/**
 * Controlador Pagina Sacramento Uncion de los Enfermos
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Unción de los Enfermos";
    addJsRef("public/js/main.js");

    renderizar("parroquia/uncionDeLosEnf", $arrViewData); 
 }  

 run();

?>