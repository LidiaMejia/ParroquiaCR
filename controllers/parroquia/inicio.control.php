<?php

/**
 * Controlador Pagina Inicio
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Inicio";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/inicio",$arrViewData),
}

run();

?>