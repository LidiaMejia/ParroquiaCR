<?php

/** 
 * Controlador para la Accion de Agregar imagenes a los productos
 *  
 * @return void 
 */ 
require_once "models/mantenimientos/productos.model.php";

function run()
{
    $arrViewData = array();

    $arrViewData['codprd'] = 0;
    $arrViewData['dscprd'] = '';
    $arrViewData['sdscprd'] = '';
    $arrViewData['ldscprd'] = '';
    $arrViewData['skuprd'] = '';
    $arrViewData['bcdprd'] = '';
    $arrViewData['stkprd'] = 0;
    $arrViewData['typprd'] = '';
    $arrViewData['prcprd'] = 0;
    $arrViewData['urlprd'] = '';
    $arrViewData['urlthbprd'] = '';
    $arrViewData['estprd'] = '';
    
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET['codprd'])) {
            $arrViewData['codprd'] = intval($_GET['codprd']);

            if ($arrViewData['codprd'] !== 0) {
                $arrTemp = obtenerUnProducto($arrViewData['codprd']);
                mergeFullArrayTo($arrTemp, $arrViewData);
            }
        }
    }

   
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        if (isset($_POST['token'])
            && isset($_SESSION['token_productosimg'])
            && $_POST['token'] === $_SESSION['token_productosimg']
        ) {
           
            $arrViewData['codprd'] = intval($_POST['codprd']);
          

            if (isset($_FILES["uploadUrlPrd"]) && isset($_POST["btnGuardarUrlPrd"])) {
                //Obtiene los datos necesarios para generar el registro
                $udir = "public/prods/"; 
                $fname = basename($_FILES["uploadUrlPrd"]["name"]);
                $fsize = $_FILES["uploadUrlPrd"]["size"]; 
                $tfil =  $udir . $arrViewData['codprd']."_".preg_replace('/(?:[^\w|\.])/m', '_', $fname);
                move_uploaded_file($_FILES["uploadUrlPrd"]["tmp_name"], $tfil); 
                setImageProducto($tfil, $arrViewData["codprd"], "PRT");
                redirectWithMessage("Imágen de Portada Actualizada", "index.php?page=productos");
                die();
            }
            if (isset($_FILES["uploadUrlThbPrd"])  && isset($_POST["btnGuardarUrlThbPrd"])) {
                $udir = "public/prods/"; 
                $fname = basename($_FILES["uploadUrlThbPrd"]["name"]); 
                $fsize = $_FILES["uploadUrlThbPrd"]["size"]; 
                $tfil =  $udir . $arrViewData['codprd'] . "_" . preg_replace('/(?:[^\w|\.])/m', '_', $fname);
                move_uploaded_file($_FILES["uploadUrlThbPrd"]["tmp_name"], $tfil); 
                setImageProducto($tfil, $arrViewData["codprd"], "THB");
                redirectWithMessage("Imágen de Catálogo Actualizada", "index.php?page=productos");
                die();
            }

        } else {
            error_log("INTENTO DE ATAQUE XRS DE ". $_SERVER["REMOTE_ADDR"]);
        }
    }

  
    $xrsToken = md5(time() . random_int(0, 10000) . "prodimg");
    $arrViewData['token'] = $xrsToken;
    $_SESSION['token_productosimg'] = $xrsToken;

    //Titulo
    $arrViewData['modedsc'] = "Imágenes de ".$arrViewData['skuprd']." ".$arrViewData['dscprd'];

    $arrViewData['hasAction'] = true;

    renderizar("mantenimientos/productoimg", $arrViewData);
}

run();

?>