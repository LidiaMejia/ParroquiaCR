<?php

/**
 * Controlador de la Carretilla Anonima
 * 
 * @return void
 */

 require_once "models/mantenimientos/productos.model.php";

 function run()
 {
    $arrViewData = array();

    $cartAnonUID = '';
    
    if(isset($_SESSION["cart_anon_UID"]))
    {
        $cartAnonUID = $_SESSION["cart_anon_UID"];
    }

    if($cartAnonUID === '')
    {
        $cartAnonUID = time() . random_int(1000, 9999);
    }

    $_SESSION["cart_anon_UID"] = $cartAnonUID; 

    $arrViewData = getDetailCartAnon($cartAnonUID); //La funcion trae un array con los datos y el nombre del atributo que se llama en el view para mostrar

    renderizar("infinito/cart", $arrViewData); //ANONIMA Y AUTENTICADA COMPARTEN LA MISMA VIEW
 }

 run();

?>