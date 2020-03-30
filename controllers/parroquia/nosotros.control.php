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

    renderizar("parroquia/nosotros", $arrViewData);
 }  

 run();

?>