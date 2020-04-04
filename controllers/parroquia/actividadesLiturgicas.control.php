<?php

/**
 * Controlador Pagina Actividades Liturgicas
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Actividades Liturgicas";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/actividadesLiturgicas",$arrViewData),
}

run();

?>