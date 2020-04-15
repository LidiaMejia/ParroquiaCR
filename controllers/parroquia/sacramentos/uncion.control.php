<?php

/**
 * Controlador Pagina Sacramento Uncion de los Enfermos
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Unción de los Enfermos";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("nosotros","");
    addToContext("sacramentos","active");
    addToContext("dimensiones","");
    addToContext("pastorales","");
    addToContext("plataforma","");
    addToContext("servicios","");
    addToContext("home","");
    addToContext("login","");
    addToContext("register","");
    addToContext("cart","");

    renderizar("parroquia/sacramentos/uncion", $arrViewData); 
 }  

 run();

?>