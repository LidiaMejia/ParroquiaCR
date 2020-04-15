<?php

/**
 * Controlador Pagina Sacramento Eucaristia
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Eucaristía";
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

    renderizar("parroquia/sacramentos/eucaristia", $arrViewData);
 }  

 run();

?>