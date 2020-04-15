<?php

/**
 * Controlador Pagina Servicios Actividades Liturgicas
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Actividades";
    
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("nosotros","");
    addToContext("sacramentos","");
    addToContext("dimensiones","");
    addToContext("pastorales","");
    addToContext("plataforma","");
    addToContext("servicios","active");
    addToContext("home","");
    addToContext("login","");
    addToContext("register","");
    addToContext("cart","");

    renderizar("parroquia/servicios/actividades", $arrViewData);
 }  

 run();

?>