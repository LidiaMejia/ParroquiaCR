<?php

/**
 * Controlador Pagina Confesiones
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Confesiones";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/confesiones",$arrViewData),
}

run();

?>