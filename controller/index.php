<?php

require("../db/index.php");

if(isset($_POST['login'])){
    try{
        $clave = $_POST['claveTrabajador'];
        $correo = $_POST['correoTrabajador'];
        $connection = Database::connect();
        $sqlLogin = "SELECT * FROM usuario WHERE correo = :correo AND clave = :clave";
        $login = $connection->prepare($sqlLogin);
        $login->bindParam(":correo",$correo,PDO::PARAM_STR);
        $login->bindParam(":clave",$clave,PDO::PARAM_STR);
        $login->execute();
        $login=$login->fetchAll(PDO::FETCH_ASSOC);
        
        if(empty($login)) header("Location: /softkit/pages");
        else{
            $login = $login[0];
            session_start();
            $_SESSION['rol'] = $login['rol'];
            $_SESSION['nombre'] = $login['nombre']." ".$login['apellido'];
            $_SESSION['id'] = $login['id'];
            $_SESSION['login'] = true;
            header("Location: /softkit/pages");
        }
    }catch(PDOException $e){
        debug_to_console($e);
    }
}


if(isset($_GET['logout'])){
    session_start();
    session_destroy();
    header("Location: /softkit/pages/");
}


if(isset($_POST['register-worker'])){
    try{
        $clave = $_POST['claveTrabajador'];
        $nombre = $_POST['nombreTrabajador'];
        $rol = $_POST['rolTrabajador'];
        $correo = $_POST['correoTrabajador'];
        $connection = Database::connect();
        $sqlNuevoTrabajador = "INSERT INTO `usuarios` (`correo`,`clave`,`rol`,`nombre`) VALUES (:correo,:clave,:rol,:nombre)";
        $nuevoTrabajador = $connection->prepare($sqlNuevoTrabajador);
        $nuevoTrabajador->bindParam(":correo",$correo,PDO::PARAM_STR);
        $nuevoTrabajador->bindParam(":clave",$clave,PDO::PARAM_STR);
        $nuevoTrabajador->bindParam(":rol",$rol,PDO::PARAM_STR);
        $nuevoTrabajador->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $nuevoTrabajador->execute();
        header("Location: /softkit/pages/nuevo-trabajador.php");
    }catch(PDOException $e){

    }
}


if(isset($_POST['register-product'])){
    try{
        $nombre = $_POST['nombreProducto'];
        $precio = $_POST['precioProducto'];
        $descripcion = $_POST['descripcionProducto'];
        $stock = $_POST['stockProductos'];
        $codigo = $_POST['codigoCompra'];
        $proveedor = $_POST['proveedorKit'];
        $fecha_ingreso = $_POST['fechaIngreso'];
        $fecha_vencimiento = $_POST['fechaVencimiento'];
        $connection = Database::connect();
        $sqlNuevo = "INSERT INTO productos (precio,descripcion,fecha_ingreso,fecha_vencimiento,codigo_compra,proveedor,nombre,stock) VALUES (:precio,:descrip,:fec_ing,:fec_ven,:codigo,:proveedor,:nombre,:stock)";
        $nuevoProduct = $connection->prepare($sqlNuevo);
        $nuevoProduct->bindParam(":precio",$precio,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":descrip",$descripcion,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":fec_ing",$fecha_ingreso,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":fec_ven",$fecha_vencimiento,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":codigo",$codigo,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":proveedor",$proveedor,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":stock",$stock,PDO::PARAM_STR);
        $nuevoProduct->execute();
        header("Location: /softkit/pages/almacen.php");
    }catch(PDOException $e){

    }
}

if(isset($_POST['generate-kits'])){
    session_start();
    try{
        $id = $_SESSION['id'];
        $kits = $_POST['kits'];
        $productos = $_POST['productos'];
        $cantidad = $_POST['cantidad'];
        $propuesta = $_POST['propuesta'];
        $connection = Database::connect();

        $limit = $kits*$cantidad;

        $sql = "SELECT `id`,`preciounitario` FROM `producto` WHERE `estado`=1 AND `stock`>=:limit";
        $products = $connection->prepare($sql);
        $products->bindParam(":limit",$limit,PDO::PARAM_STR);
        $products->execute();
        $products=$products->fetchAll(PDO::FETCH_ASSOC);

        $datos=array();
        $fin=array();
        
        for ($i=0; $i < sizeof($products); $i++) {
            $obj = new stdClass();
            $obj -> id=$products[$i]['id'];
            $obj -> precio=$products[$i]['preciounitario'];
            $obj -> subtotal=$products[$i]['preciounitario']*$cantidad;
            array_push($datos, $obj);
        }
        
        for ($i=0; $i < $propuesta; $i++) {
            $total=0;
            $sub = $datos;
            $obj = array();
            for ($j=0; $j < $productos; $j++) { 
                $r = rand(0,sizeof($sub)-1);
                array_push($obj, $sub[$r]);
                unset($sub[$r]);
                $sub = array_values($sub);
            }
            if(in_array($obj, $fin)){
                debug_to_console("Se repite");
                $i--;
            }else{
                $fin[$i]=$obj;
                foreach($obj as $key=>$value){
                    $total += $value->subtotal;
                }
                
                $sql2 = "INSERT INTO kit (total, usuario, estado) VALUES(:total, :id, 1)";
                $kit = $connection->prepare($sql2);
                $kit->bindParam(":total",$total,PDO::PARAM_STR);
                $kit->bindParam(":id",$id,PDO::PARAM_STR);
                $result=$kit->execute();
                $idkit = strval($connection->lastInsertId());

                if($result && !is_null($idkit)){
                    foreach($obj as $key=>$value){
                        $sql3="INSERT INTO kit_x_producto (idProducto, cantidad, subtotal, idKit)
                        VALUES(:idproducto, :cantidad, :subtotal, :idkit)";
                        $kitproducto = $connection->prepare($sql3);
                        $kitproducto->bindParam(":idproducto",$value->id,PDO::PARAM_STR);
                        $kitproducto->bindParam(":cantidad",$cantidad,PDO::PARAM_STR);
                        $kitproducto->bindParam(":subtotal",$value->subtotal,PDO::PARAM_STR);
                        $kitproducto->bindParam(":idkit",$idkit,PDO::PARAM_STR);
                        $kitproducto->execute();
                    }
                }
            }
        }
        header("Location: /softkit/pages/distribucion.php");
    }catch(PDOException $e){
        debug_to_console($e);
    }
}

if(isset($_POST['remove-kits'])){
    try{
        $connection = Database::connect();
        $sql = "DELETE FROM kit WHERE `estado`=1";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        header("Location: /softkit/pages/distribucion.php");
    }catch(PDOException $e){

    }
}

if(isset($_POST['process-kit'])){
    $id = $_POST['process-kit'];
    try{
        $connection = Database::connect();
        $sql = "UPDATE kit set `estado`=2 WHERE `id`=:id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":id",$id,PDO::PARAM_STR);
        $stmt->execute();
        /*
        Código para actualizar el stock de los productos

        $sql2 = "SELECT p.descripcion, kp.cantidad, p.stock FROM kit k JOIN kit_x_producto kp JOIN producto p
        WHERE kp.idkit = k.id AND p.id = kp.idproducto AND k.id = :id"; <- Obtienes los productos del kit

        */
        header("Location: /softkit/pages/distribucion.php");
    }catch(PDOException $e){

    }
}

function createBackup(){
    try{
        return true;
    }catch(PDOException $e){
        return false;
    }
}


function propuestaDistribucion(){
    try{
        return true;
    }catch(PDOException $e){
        return false;
    }
}


function listAllKits(){
    try{
        $connection=Database::connect();
        $sql="SELECT k.id, CONCAT(u.nombre,' ',u.apellido) as usuario, (SELECT COUNT(*) FROM kit_x_producto kp 
        WHERE kp.idKit = k.id) as productos, k.total, k.fechaCreacion FROM kit k JOIN usuario u WHERE u.id = k.usuario AND k.estado = 1 ORDER BY k.fechaCreacion DESC";
        $listKits=$connection->prepare($sql);
        $listKits->execute();
        $listKits=$listKits->fetchAll(PDO::FETCH_ASSOC);
        return $listKits;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}


function listAllProcessedKits(){
    try{
        $connection=Database::connect();
        $sql="SELECT k.id, CONCAT(u.nombre,' ',u.apellido) as usuario, (SELECT COUNT(*) FROM kit_x_producto kp 
        WHERE kp.idKit = k.id) as productos, k.total, k.fechaCreacion FROM kit k JOIN usuario u WHERE u.id = k.usuario AND k.estado = 2 ORDER BY k.fechaCreacion DESC";
        $listKits=$connection->prepare($sql);
        $listKits->execute();
        $listKits=$listKits->fetchAll(PDO::FETCH_ASSOC);
        return $listKits;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}


function listAllProducts(){
    try{
        $connection=Database::connect();
        $sql="SELECT * FROM producto ORDER BY id DESC";
        $listKits=$connection->prepare($sql);
        $listKits->execute();
        $listKits=$listKits->fetchAll(PDO::FETCH_ASSOC);
        return $listKits;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}


function getAmountProducts(){
    try{
        $connection=Database::connect();
        $sql="SELECT SUM(`stock`) FROM `producto` WHERE `estado` = 1";
        $stmt=$connection->prepare($sql);
        $stmt->execute();
        $amount=$stmt->fetchColumn();
        return $amount;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>