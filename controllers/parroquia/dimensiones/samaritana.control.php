<?php

/**
 * Controlador Pagina Dimension Samaritana
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Dimensión Samaritana";
    addJsRef("public/js/main.js");

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("nosotros","");
    addToContext("sacramentos","");
    addToContext("dimensiones","active");
    addToContext("pastorales","");
    addToContext("plataforma","");
    addToContext("servicios","");
    addToContext("home","");
    addToContext("login","");
    addToContext("register","");
    addToContext("cart","");

    renderizar("parroquia/dimensiones/samaritana", $arrViewData);
 }  

 run();

?>