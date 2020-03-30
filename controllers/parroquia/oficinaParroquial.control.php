<?php

/**
 * Controlador Pagina Oficina Parroquial
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Oficina Parroquial";
    addJsRef("public/js/main.js");

    renderizar("parroquia/oficinaParroquial", $arrViewData);
 }  

 run();

?>