<?php

require_once "libs/dao.php";

//Tiempo que puede permanecer un producto en la carretilla Autenticada
function getAuthTimeDelta()
{
    return 21600; //6 Horas // 6 * 60 * 60; // horas * minutos * segundo
}

//Tiempo que puede permanecer un producto en la carretilla anonima
function getUnAuthTimeDelta()
{
    return 600; //10 minutos // 10 * 60; //h , m, s
}


//Obtener datos de un Producto
function obtenerUnProducto($codprd)
{
    $sqlSelect = "SELECT * FROM productos WHERE codprd = %d;";

    return obtenerUnRegistro(
            sprintf($sqlSelect, $codprd)
        );
}

//Obtener los datos de un producto del Catalogo
function getOneProductoCatalogo($codprd)
{
    $sqlSelect = "SELECT codprd, dscprd, stkprd, skuprd, urlthbprd, prcprd
                  from productos where  codprd=%d;";

    $tmpProducto =  obtenerRegistros(
        sprintf($sqlSelect, $codprd)
    );

    $assocProducto = array();

    foreach ($tmpProducto as $producto) 
    {
        //Si no hay imagen, se coloca la de "No hay imagen disponible"
        $assocProducto[$producto["codprd"]] = $producto;

        if (preg_match('/^\s*$/', $producto["urlthbprd"])) 
        {
            $assocProducto[$producto["codprd"]]["urlthbprd"] = "public/imgs/noprodthb.png";
        }
    }

    //Si existe el registro se devuelve, sino se manda un arreglo vacio
    if (count($assocProducto)) 
    {
        return $assocProducto[$codprd];
    }
    else 
    {
        return array();
    }
}


//Agregar un producto a la carretilla autenticada
function addToAutCart($codprod, $usuario, $cantidad, $precio)
{
    $productoCart = getOneProductoCatalogo($codprod); 
    error_log(json_encode($productoCart)); //Log de compra autorizada

    if (count($productoCart)) 
    {
        $sqlins = "INSERT INTO `carretilla`
        (`usercod`, `codprd`, `crrctd`, `crrprc`, `crrfching`)
        VALUES (%d, %d, %d, %f, now())
        ON DUPLICATE KEY UPDATE crrctd = crrctd + VALUES(crrctd),
        crrfching = now();";

        return ejecutarNonQuery(
            sprintf($sqlins, $usuario, $codprod, $cantidad, $precio)
        );
    }

    return 0;
}

//Obtener cantidad de productos que hay en la carretilla autenticada de ese usuario que no han vencido
function getCantProdAut($usercod)
{
    $sqlstr = "select count(*) as productos from `carretilla`
              where usercod = %d and TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= %d;";

    $data =  obtenerUnRegistro(
        sprintf($sqlstr, $usercod, getAuthTimeDelta()
        )
    );

    if (count($data) > 0) 
    {
        return $data["productos"]; 
    }

    return 0;
}

//Obtener cantidad de productos que hay en la carretilla anonima de ese usuario que no han vencido
function getCantProdAnon($uniqueUser)
{
    //Cantidad de productos que hay en la carretilla aninoma que no han vencido
    $sqlstr = "SELECT count(*) AS productos FROM `carretillaanon`
               WHERE anoncod = '%s' AND TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= %d;";

    $data = obtenerUnRegistro(
        sprintf($sqlstr, $uniqueUser, getUnAuthTimeDelta())
    );

    if (count($data) > 0)
    {
        return $data["productos"];
    }

    return 0;
}

//Eliminar un producto de la carretilla autenticada.
function delProdCartAut($codprod, $usuario, $cantidad)
{
    $productoCart = array();

    //Se obtiene todo lo que hay en la carretilla de ese producto para ese usuario
    $sqlSel = "select * from carretilla where usercod=%d and codprd=%d;";

    $productoCart = obtenerUnRegistro(
        sprintf($sqlSel, $usuario, $codprod)
    );

    if (count($productoCart)) 
    {
        //Se guarda la nueva cantidad
        $newContidad = $productoCart["crrctd"] - $cantidad;

        //Si queda todavia cantidad de ese producto en la carretilla
        if ($newContidad > 0) 
        {
            //Solo se actualiza
            $sqlupd = "UPDATE carretilla set crrctd = %d, crrfching = now()
                where usercod=%d and codprd=%d;";

            return ejecutarNonQuery(
                sprintf($sqlupd, $newContidad, $usuario, $codprod)
            );
        }
        else
        {
            //Sino se elimina el registro del producto
            $sqldel = "DELETE from carretilla where usercod=%d and codprd=%d;";

            return ejecutarNonQuery(
                sprintf($sqldel, $usuario, $codprod)
            );
        }
    }

    return 0;
}

//Eliminar toda la carretilla autenticada.
function delAllCartAut($usuario)
{
    $sqlDel = "DELETE from carretilla where usercod=%d;";

    return ejecutarNonQuery(
        sprintf($sqlDel,$usuario)
    );
}

//Agregar producto a carretilla anonima.
function addToAnonCart($codprod, $uniqueUser, $cantidad, $precio)
{
    $productoCart = getOneProductoCatalogo($codprod);

    if (count($productoCart)) 
    {
        $sqlins = "INSERT INTO `carretillaanon`
        (`anoncod`, `codprd`, `crrctd`, `crrprc`, `crrfching`)
        VALUES ('%s', %d, %d, %f, now())
        ON DUPLICATE KEY UPDATE crrctd = crrctd + VALUES(crrctd),
        crrfching = now();";

        return ejecutarNonQuery(
            sprintf($sqlins, $uniqueUser, $codprod, $cantidad, $precio)
        );
    }

    return 0;
}

//Mostrar el detalle de la carretilla anonima.
function getDetailCartAnon($usuario)
{
    $sqlstr = "select a.codprd, b.skuprd, b.dscprd, a.crrctd, a.crrprc
               from `carretillaanon` a inner join `productos` b on a.codprd = b.codprd
               where a.anoncod = '%s' and TIME_TO_SEC(TIMEDIFF(now(), a.crrfching)) <= %d;";

    $arrProductos = obtenerRegistros(
        sprintf($sqlstr, $usuario, getUnAuthTimeDelta())
    );

    $arrProductosFinal = array();
    $arrProductosFinal["products"] = array();
    $arrProductosFinal["totctd"] = 0; //Para acumular cantidad de cada producto
    $arrProductosFinal["total"] = 0; //Para acumular el total por producto y mostrar total final
    $counter = 1;

    foreach ($arrProductos as $producto) 
    {
        $producto["line"] = $counter;
        $producto["total"] = number_format($producto["crrctd"] * $producto["crrprc"], 2);
        $arrProductosFinal["totctd"] += $producto["crrctd"];
        $arrProductosFinal["total"] += ($producto["crrctd"] * $producto["crrprc"]);
        $arrProductosFinal["products"][] = $producto; //Todo se guarda aqui
        $counter ++;
    }

    $arrProductosFinal["total"] = number_format($arrProductosFinal["total"], 2);

    return $arrProductosFinal;
}

//Eliminar toda la carretilla anonima.
function delAllCartAnon($uniqueUser)
{
    $sqlDel = "DELETE from carretillaanon where anoncod='%s';";

    return ejecutarNonQuery(
        sprintf($sqlDel, $uniqueUser)
    );
}

//Eliminar un producto de la carretilla anonima.
function delProdCartAnon($codprod, $uniqueUser, $cantidad)
{
    $productoCart = array();

    $sqlSel = "select * from carretillaanon where anoncod='%s' and codprd=%d;";

    $productoCart = obtenerUnRegistro(
        sprintf($sqlSel, $uniqueUser, $codprod)
    );

    if (count($productoCart)) 
    {
        $newContidad = $productoCart["crrctd"] - $cantidad;

        if ($productoCart["crrctd"] - $cantidad > 0) 
        {

            $sqlupd = "UPDATE carretillaanon set crrctd = %d, crrfching = now()
                      where anoncod='%s' and codprd=%d;";

            return ejecutarNonQuery(
                sprintf($sqlupd, $newContidad, $uniqueUser, $codprod)
            );
        }
        else
        {
            $sqldel = "DELETE from carretillaanon where anoncod='%s' and codprd=%d;";

            return ejecutarNonQuery(
                sprintf($sqldel, $uniqueUser, $codprod)
            );
        }
    }

    return 0;
}

//Pasa los productos de la carretilla anonima a la carretilla autenticada
function passAnonToAutCart($uniqueUser, $user)
{
    // Iniciamos Transacción para realizar varias sentencias (ES COMO UN PROCEDIMIENTO ALMACENADO. //BEGIN)
    // Y confirmar al final del Ciclo si no hay algun error
    iniciarTransaccion();

    $sqlins = "INSERT INTO `carretilla`
        (`usercod`, `codprd`, `crrctd`, `crrprc`, `crrfching`)
      SELECT %d as `usercodt`, `codprd` as codprdt,
        `crrctd` as crrctdt, `crrprc` as crrprct, `crrfching` as crrfchingt
         FROM `carretillaanon`
      where `anoncod` = '%s'
      ON DUPLICATE KEY UPDATE
        `carretilla`.`crrctd` = `carretilla`.crrctd + VALUES(`carretilla`.`crrctd`),
         crrfching = now();";

    ejecutarNonQuery(
        sprintf($sqlins, $user, $uniqueUser)
    );

    //Se borra la carretilla anonima del unique user
    $sqldel = "DELETE FROM `carretillaanon` where anoncod = '%s';";

    ejecutarNonQuery(
        sprintf($sqldel, $uniqueUser)
    );

    terminarTransaccion();

    //Se retorna cantidad de productos que hay en la carretilla autenticada
    return getCantProdAut($user);
}


?>