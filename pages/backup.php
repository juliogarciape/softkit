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
        0 => [
            "date" => "9:30 am / 7-11-2022",
            "size" => "250 kb"
        ],
        1 => [
            "date" => "9:30 am / 11-11-2022",
            "size" => "500 kb"
        ],
        2 => [
            "date" => "9:30 am / 14-11-2022",
            "size" => "750 kb"
        ],
        3 => [
            "date" => "9:30 am / 18-11-2022",
            "size" => "900 kb"
        ],
        4 => [
            "date" => "9:30 am / 21-11-2022",
            "size" => "1024 kb"
        ],
        5 => [
            "date" => "9:30 am / 25-11-2022",
            "size" => "1.1 mb"
        ],
        6 => [
            "date" => "9:30 am / 28-11-2022",
            "size" => "1.1 mb"
        ],
        7 => [
            "date" => "9:30 am / 02-12-2022",
            "size" => "1.2 mb"
        ]
    ]

?>

<div class="container-fluid mt-5 d-flex justify-content-center">
    <a class="btn btn-primary w-50 btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" href="?nuevo=registro" role="button">
        Generar copia de seguridad 
        <i class="bi bi-gear-wide-connected"></i>
    </a>
</div>

<div class="container-fluid mb-5 mt-5">
    <div class="row">

    <?php foreach($data as $item): ?>
    
    <div class="col-3 mb-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-warning fw-bold">
                <?= $item['date']; ?>
            </div>
            <div class="card-body d-flex justify-content-center gap-3">
                <div class="d-flex align-items-center" style="font-size: 4rem;">
                    <i class="bi bi-file-earmark-zip-fill"></i>
                </div>
                <ul class="card-text mb-0 ms-3 ps-0" style="list-style: none;">
                    <li class="fw-bold">Generado por:</li>
                    <li class="mb-2">Renato Guierrez</li>
                    <li class="fw-bold">Tamaño:</li>
                    <li><?= $item['size']; ?></li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between gap-3">
                <button class="btn w-100 btn-outline-danger">
                    Eliminar
                </button>
                <button class="btn w-100 btn-outline-primary">
                    Descargar
                </button>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

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