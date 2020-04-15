<?php

/**
 * Controlador Pagina Pastoral Juvenil
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Pastoral Juvenil";
    addJsRef("public/js/main.js");

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

    renderizar("parroquia/pastorales/juvenil", $arrViewData);
 }  

 run();

?>