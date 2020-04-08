<?php

/**
 * Controlador Pagina Dimension Samaritana
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Dimensión Samaritana";
    addJsRef("public/js/main.js");

    renderizar("parroquia/dimensiones/samaritana", $arrViewData);
 }  

 run();

?>