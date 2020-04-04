<?php

/**
 * Controlador Pagina Infantiles
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Infantiles";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/infantiles",$arrViewData),
}

run();

?>