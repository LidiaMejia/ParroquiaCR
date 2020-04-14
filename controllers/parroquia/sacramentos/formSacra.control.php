<?php

/**
 * Controlador Pagina Sacramento Formulario de Solicitud de Informacion
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Información de Sacramentos";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    renderizar("parroquia/sacramentos/formSacra", $arrViewData);
 }  

 run();

?>