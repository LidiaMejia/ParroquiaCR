<?php

/**
 * Controlador Pagina Pastoral Infantil
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Infantil";
    
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
    addToContext("home","");
    addToContext("login","");
    addToContext("register","");
    addToContext("cart","");

    renderizar("parroquia/pastorales/infantiles", $arrViewData);
 }  

 run();

?>