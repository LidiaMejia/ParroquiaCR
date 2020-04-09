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
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/sacramentos/matrimonio", $arrViewData);
 }  

 run();

?>