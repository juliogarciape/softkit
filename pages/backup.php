<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es-PE">
<head>
    <?php require("../partials/head.php"); ?>
</head>
<body class="bg-main">

<?php

    require("../partials/header.php");
    require_once("../controller/index.php");
    
    $data = [
        0 => [],
        1 => [],
        2 => [],
        3 => [],
        4 => [],
        5 => [],
        6 => [],
        7 => [],
        8 => []
    ]

?>

<div class="container-fluid mt-5 d-flex justify-content-center">
    <a class="btn btn-primary w-50 btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" href="?nuevo=registro" role="button">
        Generar Backup 
        <i class="bi bi-gear-wide-connected"></i>
    </a>
</div>

<div class="container-fluid mb-5 mt-5">
    <div class="row">

    <?php foreach($data as $item){ ?>
    
    <div class="col-3 mb-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-dark text-white fw-bold">
                Fecha de origen: 12-11-2022
            </div>
            <div class="card-body d-flex justify-content-center">
                <div class="fs-1">
                    <i class="bi bi-file-earmark-zip-fill"></i>
                </div>
                <ul class="card-text mb-0 ms-3 ps-0" style="list-style: none;">
                    <li class="fw-bold">Generado por:</li>
                    <li>Renato Guierrez</li>
                    <li class="fw-bold"></li>
                    <li></li>
                    <li class="fw-bold">Tamaño:</li>
                    <li>200 kb</li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button class="btn btn-outline-danger">
                    Eliminar
                </button>
                <button class="btn btn-warning">
                    Descargar
                </button>
            </div>
        </div>
    </div>

    <?php } ?>

    </div>
</div>



<div class="modal fade" id="exampleModalDel" tabindex="-1" aria-labelledby="exampleModalDel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el producto seleccionado?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-info-circle-fill"></i> Recuerda: La información guardada aún no ha sido </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar Producto <i class="bi bi-trash3"></i></button>
      </div>
    </div>
  </div>
</div>


</body>
</html>