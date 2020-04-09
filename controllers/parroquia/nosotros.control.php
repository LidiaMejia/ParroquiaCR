<?php

/**
 * Controlador Pagina Nosotros
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Nosotros";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/nosotros", $arrViewData);
 }  

 run();

?>