<?php

/**
 * Controlador Pagina Sacramento Bautismo
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Bautismo";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/sacramentos/bautismo", $arrViewData);
 }  

 run();

?>