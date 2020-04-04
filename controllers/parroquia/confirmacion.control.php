<?php

/**
 * Controlador Pagina Confirmacion
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Confirmacion";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/confirmacion",$arrViewData),
}

run();

?>