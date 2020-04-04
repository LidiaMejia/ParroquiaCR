<?php

/**
 * Controlador Pagina Comunidades
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Comunidades";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/comunidades",$arrViewData),
}

run();

?>