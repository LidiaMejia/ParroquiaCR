<?php

/**
 * Controlador Pagina Familiar
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Familiar";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/familiar",$arrViewData),
}

run();

?>