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
    addJsRef('public/js/mainindex.js');

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("nosotros","");
    addToContext("sacramentos","");
    addToContext("dimensiones","");
    addToContext("pastorales","");
    addToContext("plataforma","active");
    addToContext("servicios","");

    renderizar("parroquia/plataforma", $arrViewData); 
 }  

 run();

?>