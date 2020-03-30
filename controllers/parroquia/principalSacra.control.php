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

    renderizar("parroquia/principalSacra", $arrViewData); 
 }  

 run();

?>