<?php

/**
 * Controlador Pagina Pastoral Infantil
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Infantil";
    
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/pastorales/infantiles", $arrViewData);
 }  

 run();

?>