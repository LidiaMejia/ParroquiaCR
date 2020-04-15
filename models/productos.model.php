<?php

require_once "libs/dao.php"


function obtenerUnProducto($codprd)
{
    $sqlSelect = "SELECT * FROM productos WHERE codprd = %d;";

    return obtenerUnRegistro(
        sprintf($sqlSelect, $codprd)
    );
}
function getAuthTimeDelta()
{
    return 21600; 
}

function getUnAuthTimeDelta()
{
    return 600 ;
}

function getOneProductoCatalogo($codprd)
{
    $sqlSelect = "SELECT codprd, dscprd, skuprd, urlthbprd, prcprd
        from productos where  codprd=%d;";
    $tmpProducto =  obtenerRegistros(sprintf($sqlSelect, $codprd));
    $assocProducto = array();
    foreach ($tmpProducto as $producto) {
  
        $assocProducto[$producto["codprd"]] = $producto;
        if (preg_match('/^\s*$/', $producto["urlthbprd"])) {
            $assocProducto[$producto["codprd"]]["urlthbprd"]
                = "public/imgs/noprodthb.png";
        }
    }

    $timeDelta =  getAuthTimeDelta(); 
    $sqlSelectReserved = "select codprd, sum(crrctd) as reserved
    from carretilla where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= %d
    and codprd = %d
    group by codprd;
    ";
    $arrReserved = obtenerRegistros(
        sprintf(
            $sqlSelectReserved,
            $timeDelta,
            $codprd
        )
    );
   
  
    $timeDelta = getUnAuthTimeDelta();
    $sqlSelectReserved = "select codprd, sum(crrctd) as reserved
    from carretillaanon where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= %d
    and codprd = %d
    group by 1;
    ";
    $arrReserved = obtenerRegistros(
        sprintf(
            $sqlSelectReserved,
            $timeDelta,
            $codprd
        )
    );
  

    if (count($assocProducto)) {
        return $assocProducto[$codprd];
    } else {
        return array();
    }
}



function addToAutCart($codprod, $usuario, $cantidad, $precio)
{
    $productoCart = getOneProductoCatalogo($codprod);
    error_log(json_encode($productoCart));
    
    if (count($productoCart)) {
            $sqlins = "INSERT INTO `carretilla`
            (`usercod`, `codprd`, `crrctd`, `crrprc`, `crrfching`)
            VALUES (%d, %d, %d, %f, now())
            ON DUPLICATE KEY UPDATE crrctd = crrctd + VALUES(crrctd),
            crrfching = now();";

            return ejecutarNonQuery(
                sprintf(
                    $sqlins,
                    $usuario,
                    $codprod,
                    $cantidad,
                    $precio
                )
            );
    }
    return 0;
}

function getCartProducts($usercod)
{
    $sqlstr = " select count(*) as productos from `carretilla`
    where usercod = %d and TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= %d;";

    $data =  obtenerUnRegistro(
        sprintf(
            $sqlstr,
            $usercod,
            getAuthTimeDelta()
        )
    );

    if (count($data) > 0) {
        return $data["productos"];
    }
    return 0;
}
function delProdCartAut($codprod, $usuario, $cantidad)
{
    $productoCart = array();
    $sqlSel = "select * from carretilla where usercod=%d and codprd=%d;";

    $productoCart = obtenerUnRegistro(
        sprintf(
            $sqlSel,
            $usuario,
            $codprod
        )
    );
    if (count($productoCart)) {
        $newContidad = $productoCart["crrctd"] - $cantidad;
        if ($newContidad > 0) {
            $sqlupd = "UPDATE carretilla set crrctd = %d, crrfching = now()
                where usercod=%d and codprd=%d;
            ";
            return ejecutarNonQuery(
                sprintf(
                    $sqlupd,
                    $newContidad,
                    $usuario,
                    $codprod
                )
            );
        } else {
            $sqldel = "DELETE from carretilla where usercod=%d and codprd=%d;";
            return ejecutarNonQuery(
                sprintf(
                    $sqldel,
                    $usuario,
                    $codprod
                )
            );
        }
    }
    return 0;
}

function delAllCartAut($usuario)
{
    $sqlDel = "DELETE from carretilla
      where usercod=%d;";

    return ejecutarNonQuery(
        sprintf(
            $sqlDel,
            $usuario
        )
    );
}

function addToAnonCart($codprod, $uniqueUser, $cantidad, $precio)
{

    $productoCart = getOneProductoCatalogo($codprod);

    if (count($productoCart)) {
        if ($productoCart["stkprd"] >= $cantidad) {
            $sqlins = "INSERT INTO `carretillaanon`
            (`anoncod`, `codprd`, `crrctd`, `crrprc`, `crrfching`)
            VALUES ('%s', %d, %d, %f, now())
            ON DUPLICATE KEY UPDATE crrctd = crrctd + VALUES(crrctd),
            crrfching = now();";

            return ejecutarNonQuery(
                sprintf(
                    $sqlins,
                    $uniqueUser,
                    $codprod,
                    $cantidad,
                    $precio
                )
            );
        }
    }
    return 0;
}

function getDetailCartAnon($usuario)
{
    $sqlstr = "
      select a.codprd, b.skuprd, b.dscprd, a.crrctd, a.crrprc
      from `carretillaanon` a inner join `productos` b on a.codprd = b.codprd
      where a.anoncod = '%s' and TIME_TO_SEC(TIMEDIFF(now(), a.crrfching)) <= %d;
    ";

    $arrProductos = obtenerRegistros(
        sprintf(
            $sqlstr,
            $usuario,
            getUnAuthTimeDelta()
        )
    );
    $arrProductosFinal = array();
    $arrProductosFinal["products"] = array();
    $arrProductosFinal["totctd"] = 0;
    $arrProductosFinal["total"] = 0;
    $counter = 1;
    foreach ($arrProductos as $producto) {
        $producto["line"] = $counter;
        $producto["total"]
            = number_format(
                $producto["crrctd"] * $producto["crrprc"],
                2
            );
        $arrProductosFinal["totctd"] += $producto["crrctd"];
        $arrProductosFinal["total"] += ($producto["crrctd"] * $producto["crrprc"]);
        $arrProductosFinal["products"][] = $producto;
        $counter ++;
    }
    $arrProductosFinal["total"] = number_format($arrProductosFinal["total"], 2);
    return $arrProductosFinal;
}

function delAllCartAnon($uniqueUser)
{
    $sqlDel = "DELETE from carretillaanon
      where anoncod='%s';";

    return ejecutarNonQuery(
        sprintf(
            $sqlDel,
            $uniqueUser
        )
    );
}

function delProdCartAnon($codprod, $uniqueUser, $cantidad)
{
    $productoCart = array();
    $sqlSel = "select * from carretillaanon where anoncod='%s' and codprd=%d;";

    $productoCart = obtenerUnRegistro(
        sprintf(
            $sqlSel,
            $uniqueUser,
            $codprod
        )
    );
    if (count($productoCart)) {
        $newContidad = $productoCart["crrctd"] - $cantidad;
        if ($productoCart["crrctd"] - $cantidad > 0) {

            $sqlupd = "UPDATE carretillaanon set crrctd = %d, crrfching = now()
                where anoncod='%s' and codprd=%d;
            ";
            return ejecutarNonQuery(
                sprintf(
                    $sqlupd,
                    $newContidad,
                    $uniqueUser,
                    $codprod
                )
            );
        } else {
            $sqldel = "DELETE from carretillaanon where anoncod='%s' and codprd=%d;";
            return ejecutarNonQuery(
                sprintf(
                    $sqldel,
                    $uniqueUser,
                    $codprod
                )
            );
        }
    }
    return 0;
}

function passAnonCartToAutCart($uniqueUser, $user)
{

    iniciarTransaccion();
    $sqlins = "INSERT INTO `carretilla`
        (`usercod`, `codprd`, `crrctd`, `crrprc`, `crrfching`)
      SELECT %d as `usercodt`, `codprd` as codprdt,
        `crrctd` as crrctdt, `crrprc` as crrprct, `crrfching` as crrfchingt
         FROM `carretillaanon`
      where `anoncod` = '%s'
      ON DUPLICATE KEY UPDATE
        `carretilla`.`crrctd` = `carretilla`.crrctd + VALUES(`carretilla`.`crrctd`),
         crrfching = now();
    ";
    ejecutarNonQuery(
        sprintf(
            $sqlins,
            $user,
            $uniqueUser
        )
    );
    $sqldel = "DELETE FROM `carretillaanon` where anoncod = '%s';";
    ejecutarNonQuery(
        sprintf(
            $sqldel,
            $uniqueUser
        )
    );
    terminarTransaccion();
    return getCartProducts($user);
}

function todosLosProductos()
{
    $sqlSelect = "SELECT * FROM productos;";

    return obtenerRegistros($sqlSelect);
}

function productoCatalogo()
{
    $sqlSelect = "SELECT codprd, dscprd, skuprd, urlthbprd, prcprd
        from productos where estprd in('ACT','DSC');";
    $tmpProducto =  obtenerRegistros($sqlSelect);
    $assocProducto = array();
    foreach ($tmpProducto as $producto) {
        //Imagen predeterminada si no hay imagen
        $assocProducto[$producto["codprd"]] = $producto;
        if (preg_match('/^\s*$/', $producto["urlthbprd"])) {
            $assocProducto[$producto["codprd"]]["urlthbprd"]
                = "public/imgs/noprodthb.png"; //Insertar la direccion de la imagen------------
        }
    }
    
    $timeDelta =  getAuthTimeDelta();
    $sqlSelectReserved = "select codprd, sum(crrctd) as reserved
    from carretilla where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= %d
    group by codprd;
    ";
    $arrReserved = obtenerRegistros(
        sprintf(
            $sqlSelectReserved,
            $timeDelta
        )
    );
    
    
    $timeDelta = getUnAuthTimeDelta(); 
    $sqlSelectReserved = "select codprd, sum(crrctd) as reserved
    from carretillaanon where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= %d
    group by codprd;
    ";
    $arrReserved = obtenerRegistros(
        sprintf(
            $sqlSelectReserved,
            $timeDelta
        )
    );
  
    return $assocProducto;
}

function insertProducto($dscprd, $sdscprd, $ldscprd, $skuprd, $catprd, $prcprd,
    $urlprd, $urlthbprd, $estprd) 
{
    $sqlInsert = "INSERT INTO productos (dscprd, sdscprd, ldscprd, skuprd,
        catprd, prcprd, urlprd, urlthbprd, estprd)
        VALUES ('%s', '%s', '%s', '%s', '%s', %lf, '%s', '%s', '%s');";

    $isOk = ejecutarNonQuery(
        sprintf(
            $sqlInsert,
            $dscprd,
            $sdscprd,
            $ldscprd,
            $skuprd,
            $catprd,
            $prcprd,
            '',
            '',
            $estprd
        )
    );
    return getLastInserId();
}

function updateProducto($dscprd, $sdscprd, $ldscprd, $skuprd, $catprd, $prcprd,
    $urlprd, $urlthbprd, $estprd, $codprd) 
{
    $sqlUpdate = "UPDATE productos SET dscprd = '%s', sdscprd = '%s',
        ldscprd = '%s', skuprd = '%s', catprd = '%s', prcprd = %lf, 
        estprd = '%s' WHERE codprd = %d;";

    return ejecutarNonQuery(
        sprintf(
            $sqlUpdate,
            $dscprd,
            $sdscprd,
            $ldscprd,
            $skuprd,
            $catprd,
            $prcprd,
            $estprd,
            $codprd
        )
    );
}

function deleteProducto($codprd)
{
    $sqlDelete = "DELETE FROM productos WHERE codprd = %d;";

    return ejecutarNonQuery(
        sprintf($sqlDelete, $codprd)
    );
}

//COLOCAR IMAGEN DEL PRODUCTO
function setImageProducto($url, $codprd, $type="PRT")
{
    $sqlUpdatePRT = "UPDATE productos SET urlprd = '%s' WHERE codprd = %d;";
    $sqlUpdateTHB = "UPDATE productos SET urlthbprd = '%s' WHERE codprd = %d;";
    $sqlUpdate = ($type === "PRT") ? $sqlUpdatePRT : $sqlUpdateTHB;
    return ejecutarNonQuery(
        sprintf(
            $sqlUpdate,
            $url,
            $codprd
        )
    );
}

function getDetailCartAut($usuario)
{
    $sqlstr = "
      select a.codprd, b.skuprd, b.dscprd, a.crrctd, a.crrprc
      from `carretilla` a inner join `productos` b on a.codprd = b.codprd
      where a.usercod = %d and TIME_TO_SEC(TIMEDIFF(now(), a.crrfching)) <= %d;
    ";
    $arrProductos = obtenerRegistros(
        sprintf(
            $sqlstr,
            $usuario,
            getAuthTimeDelta()
        )
    );
    $arrProductosFinal = array();
    $arrProductosFinal["products"] = array();
    $arrProductosFinal["totctd"] = 0;
    $arrProductosFinal["total"] = 0;
    $counter = 1;
    foreach ($arrProductos as $producto) {
        $producto["line"] = $counter;
        $producto["total"]
            = number_format(
                $producto["crrctd"] * $producto["crrprc"],
                2
            );
        $arrProductosFinal["totctd"] += $producto["crrctd"];
        $arrProductosFinal["total"] += ($producto["crrctd"] * $producto["crrprc"]);
        $arrProductosFinal["products"][] = $producto;
        $counter ++;
    }
    $arrProductosFinal["total"] = number_format($arrProductosFinal["total"], 2);
    return $arrProductosFinal;
}

function cleanTimeOutCart()
{
    $contador = 0;
    iniciarTransaccion();

    //CARRETILLA ANONIMA
    $sqlDel = "DELETE from carretillaanon
      where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) > %d";

    $contador += ejecutarNonQuery(
        sprintf(
            $sqlDel,
            getUnAuthTimeDelta()
        )
    );

    // CARRETILLA AUTENTICADA
    $sqlDel = "DELETE from carretilla
      where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) > %d";

    $contador += ejecutarNonQuery(
        sprintf(
            $sqlDel,
            getAuthTimeDelta()
        )
    );
    terminarTransaccion();
    return $contador;
}

function MostrarTransacciones()
{
    $sqlSel = "SELECT u.useremail as Usuario, p.dscprd as Descripcion, fd.fctCtd as Cantidad, fd.fctPrc as Precio, f.fctcod as Codigo_Factura, f.fctfch as Fecha_Factura, 
    f.fctMonto as Monto_Factura, f.fctTotal as Total_Factura FROM factura f
    inner join factura_detalle fd on f.fctcod = fd.fctcod
    inner join productos p on fd.codprd = p.codprd
    inner join carretilla c on p.codprd = c.codprd
    inner join usuario u on  c.usercod = u.usercod;
    "

    return ejecutarNonQuery();
}


?>