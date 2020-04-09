<?php

/**
 * Controlador Pagina Sacramento Eucaristia
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Eucaristía";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/sacramentos/eucaristia", $arrViewData);
 }  

 run();

?>