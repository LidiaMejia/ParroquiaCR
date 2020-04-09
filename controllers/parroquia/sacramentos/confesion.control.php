<?php

/**
 * Controlador Pagina Sacramento Confesion
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Confesión";
    
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/sacramentos/confesion", $arrViewData);
 }  

 run();

?>