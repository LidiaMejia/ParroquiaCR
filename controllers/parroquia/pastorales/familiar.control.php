<?php

/**
 * Controlador Pagina Pastoral Familiar
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Familiar";
    
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/pastorales/familiar", $arrViewData);
 }  

 run();

?>