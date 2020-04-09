<?php

/**
 * Controlador Pagina Sacramento Confirmacion
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Confirmación";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/sacramentos/confirmacion", $arrViewData);
 }  

 run();

?>