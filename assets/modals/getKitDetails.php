<?php

require("../../db/index.php");

$id=$_POST['id'];
$response=new stdClass();

$connection=Database::connect();
$sql="SELECT k.id, CONCAT(u.nombre,' ',u.apellido) as usuario, (SELECT COUNT(*) FROM kit_x_producto kp 
WHERE kp.idKit = k.id) as productos, p.descripcion, p.precioUnitario, kp.cantidad, kp.subtotal, k.total, k.fechaCreacion FROM kit k 
JOIN usuario u JOIN producto p JOIN kit_x_producto kp WHERE u.id = k.usuario AND k.id = kp.idKit AND kp.idProducto = p.id AND k.id = :id";
$kitDetails=$connection->prepare($sql);
$kitDetails->bindParam(":id",$id,PDO::PARAM_STR);
$result = $kitDetails->execute();
if($result){
    $kitDetails=$kitDetails->fetchAll(PDO::FETCH_ASSOC);
    
    $response->state=true;
    $response->detail=$kitDetails;
}else{
    $response->state=false;
    $response->detail='Error';
}

header('Content-Type: application/json');
echo json_encode($response);