<?php

/**
 * Controlador Pagina Principal Sacramentos
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Sacramentos";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/sacramentos", $arrViewData); 
 }  

 run();

?>