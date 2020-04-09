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
   addJsRef('public/js/mainindex.js');
    
   renderizar("parroquia/dimensiones/comunidades",$arrViewData);
} 
 
run(); 
 
?>