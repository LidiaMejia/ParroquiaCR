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

   //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("nosotros","");
    addToContext("sacramentos","");
    addToContext("dimensiones","active");
    addToContext("pastorales","");
    addToContext("plataforma","");
    addToContext("servicios","");
    addToContext("home","");
    addToContext("login","");
    addToContext("register","");
    addToContext("cart","");
    
   renderizar("parroquia/dimensiones/comunidades",$arrViewData);
} 
 
run(); 
 
?>