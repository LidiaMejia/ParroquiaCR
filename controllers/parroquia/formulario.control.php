<?php

/**
 * Controlador Pagina Formulario
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Formulario";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/formulario",$arrViewData),
}

run();

?>