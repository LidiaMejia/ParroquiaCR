<?php

/**
 * Controlador Pagina Sacramento Matrimonio
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Matrimonio";
    addJsRef("public/js/main.js");

    renderizar("parroquia/matrimonio", $arrViewData);
 }  

 run();

?>