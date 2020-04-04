<?php

/**
 * Controlador Pagina Eucaristia
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Eucaristia";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/eucaristia",$arrViewData),
}

run();

?>