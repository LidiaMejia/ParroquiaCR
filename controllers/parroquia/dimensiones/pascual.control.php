<?php

/**
 * Controlador Pagina Dimension Pascual
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Dimensión Pascual";
    addJsRef("public/js/main.js");

    renderizar("parroquia/dimensiones/pascual", $arrViewData); 
 }  

 run();

?>