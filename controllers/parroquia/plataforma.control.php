<?php

/**
 * Controlador Pagina Plataforma Educativa
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Plataforma Educativa";
    addJsRef("public/js/main.js");

    renderizar("parroquia/plataforma", $arrViewData); 
 }  

 run();

?>