<?php

/**
 * Controlador Pagina Bautismmo
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Bautismo";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/bautismo",$arrViewData),
}

run();

?>