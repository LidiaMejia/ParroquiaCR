<?php
/**
 * PHP Version 5
 * Application Router
 *
 * @category Router
 * @package  Router
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @author   Luis Fernando Gomez Figueroa <lgomezf16@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */
session_start();

require_once "libs/utilities.php";

$pageRequest = "index"; //*Pagina de Inicio de la Parroquia

if (isset($_GET["page"])) {
    $pageRequest = $_GET["page"];
}

//Incorporando los midlewares son codigos que se deben ejecutar
//Siempre
require_once "controllers/mw/verificar.mw.php";
require_once "controllers/mw/site.mw.php";
//require_once "controllers/infinito/mw/cart.mw.php"; //Para el contador del carrito y pasar de anonima a autenticada

// aqui no se toca jajaja la funcion de este index es
// llamar al controlador adecuado para manejar el
// index.php?page=modulo

    //Este switch se encarga de todo el enrutamiento público
switch ($pageRequest) {
    //Accesos Publicos
case "home":
    //llamar al controlador
    include_once "controllers/home.control.php";
    die();
case "login":
    include_once "controllers/security/login.control.php";
    die();
case "logout":
    include_once "controllers/security/logout.control.php";
    die();

 //*En la carpeta security para el registro de usuarios
 case "register":
    include_once "controllers/security/register.control.php";
    die();

  //*Paginas Publicas de la Parroquia
  case "juvenil":
    include_once "controllers/parroquia/juvenil.control.php";
  die();

  case "matrimonio":
    include_once "controllers/parroquia/matrimonio.control.php";
  die();

  case "misionera":
    include_once "controllers/parroquia/misionera.control.php";
  die();

  case "nosotros":
    include_once "controllers/parroquia/nosotros.control.php";
  die();

  case "oficinaParroquial":
    include_once "controllers/parroquia/oficinaParroquial.control.php";
  die();

  case "pascual":
    include_once "controllers/parroquia/pascual.control.php";
  die();

  case "pastorales":
    include_once "controllers/parroquia/pastorales.control.php";
  die();

  case "plataforma":
    include_once "controllers/parroquia/plataforma.control.php";
  die();

  case "principalSacra":
    include_once "controllers/parroquia/principalSacra.control.php";
  die();

  case "samaritana":
    include_once "controllers/parroquia/samaritana.control.php";
  die();

  case "servicios":
    include_once "controllers/parroquia/servicios.control.php";
  die();

  case "uncionDeLosEnf":
    include_once "controllers/parroquia/uncionDeLosEnf.control.php";
  die();

  /************* CARRETILLA DE COMPRA ***********/
  case "addToCart":
    include_once "controllers/infinito/addToCart.control.php";
   die();

   case "rmvToCart":
    include_once "controllers/infinito/rmvToCart.control.php";
   die();

   case "rmvAllCart":
    include_once "controllers/infinito/rmvAllCart.control.php";
   die();

   case "cartAnon":
    include_once "controllers/infinito/cartAnon.control.php";
   die();
}

//Este switch se encarga de todo el enrutamiento que ocupa login
$logged = mw_estaLogueado();
if ($logged) {
    addToContext("layoutFile", "verified_layout");
    include_once 'controllers/mw/autorizar.mw.php';
    if (!isAuthorized($pageRequest, $_SESSION["userCode"])) {
        include_once"controllers/notauth.control.php";
        die();
    }
    generarMenu($_SESSION["userCode"]);
}

require_once "controllers/mw/support.mw.php";
switch ($pageRequest) {
case "dashboard":
    ($logged)?
      include_once "controllers/dashboard.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "users":
    ($logged)?
      include_once "controllers/security/users.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "user":
    ($logged)?
      include_once "controllers/security/user.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "roles":
    ($logged)?
      include_once "controllers/security/roles.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "rol":
    ($logged)?
      include_once "controllers/security/rol.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programas":
    ($logged)?
      include_once "controllers/security/programas.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programa":
    ($logged)?
      include_once "controllers/security/programa.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();

 //*Seguridad
 case "security":
    ($logged)?
      include_once "controllers/security/security.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
 die();

 //*Mantenimientos
 case "parametros":
    ($logged)?
      include_once "controllers/mantenimientos/mantenimientos.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
 die();

}

addToContext("pageRequest", $pageRequest);
require_once "controllers/error.control.php";
