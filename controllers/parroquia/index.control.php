<?php
/**
 * Controlador de pagina principal
 * 
 * @return void
 */

 function run(){
     $arrViewData = array();
     $arrViewData['page_title'] = 'Inicio';
     addJsRef('public/js/mainindex.js');

     renderizar("parroquia/index",$arrViewData);
 }

 run();
?>