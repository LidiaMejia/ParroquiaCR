<?php

/**
 * Controlador Pagina Principal Pastorales
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Pastorales";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("nosotros","");
    addToContext("sacramentos","");
    addToContext("dimensiones","");
    addToContext("pastorales","active");
    addToContext("plataforma","");
    addToContext("servicios","");

    renderizar("parroquia/pastorales", $arrViewData); 
 }  

 run();

?>