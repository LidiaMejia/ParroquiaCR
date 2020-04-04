<?php

/**
 * Controlador Pagina Formulario Educativo
 * 
 * @return void
 */

function run()
{
   $arrViewData = array();

   $arrViewData['page_title']= "Formulario Educativo";

   addJsRef("public/js/main.js");
   
   renderizar("parroquia/formularioEdu",$arrViewData),
}

run();

?>