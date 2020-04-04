<?php

/**
 * Controlador Pagina Dimensiones
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Dimensiones";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/dimensiones",$arrViewData),
}

run();

?>