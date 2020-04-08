<?php

/**
 * Controlador Pagina Pastoral Juvenil
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Pastoral Juvenil";
    addJsRef("public/js/main.js");

    renderizar("parroquia/pastorales/juvenil", $arrViewData);
 }  

 run();

?>