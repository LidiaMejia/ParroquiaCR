<?php

/**
 * Controlador Pagina Oficina Parroquial
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Oficina Parroquial";
    addJsRef("public/js/main.js");

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

    renderizar("parroquia/servicios/oficina", $arrViewData);
 }  

 run();

?>