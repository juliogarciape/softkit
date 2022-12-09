<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es-PE">
<head>
    <?php require("../partials/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
</head>
<body class="bg-main">

<?php

    require("../partials/header.php");
    require_once("../controller/index.php");
    
    $data = listAllProducts();

?>

<div class="container-fluid mt-5 mb-5">
<div class="card shadow-sm rounded-3">
    <div class="card-header d-flex justify-content-between bg-warning p-3">
        <h5 class="mb-0">
            <i class="bi bi-bag-plus-fill"></i>
            Registro Producto
        </h5>
        <h5 class="mb-0">
            Fundacion Calma
            <i class="bi bi-house-heart-fill"></i>
        </h5>
    </div>
    <div class="card-body">
    <form action="/softkit/controller/index.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripción del producto:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Precio Unitario (S/):</label>
            <input type="number" class="form-control" id="" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Marca:</label>
            <input type="number" class="form-control" id="" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Peso (Kg):</label>
            <input type="number" class="form-control" id="" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Stock (Unidades):</label>
            <input type="number" class="form-control" id="" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Fecha de Ingreso:</label>
            <input type="datetime-local" class="form-control" id="" required>
        </div>
    </form>
    </div>
    <div class="card-footer text-muted d-flex justify-content-center">
        <input type="hidden" value="ok" name="register-product">
        <button type="submit" id="btnGuardar" class="btn btn-primary w-75 btn-lg">
            Guardar Producto
        </button>
    </div>
</div>
</div>


</body>
</html>