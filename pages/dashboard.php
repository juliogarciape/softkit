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

?>


<div class="container mb-5 mt-5">
    <div class="row mb-4">
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-warning fw-bold">
                Almacen De Productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Toda información registrada en el almacén puede ser vista desde aquí o puede ser exportada en formato CSV 
                </p>
                <div class="text-center text-secondary" style="font-size: 3.5rem;">
                    <i class="bi bi-box-seam-fill"></i>    
                </div>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-primary w-100" href="/softkit/pages/almacen.php" role="button">
                    Visitar Almacen
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-warning fw-bold">
                Distribucion De Productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Según los productos registrados, el sistema genera propuestas de distribucion para el armado de los kits 
                </p>
                <div class="text-center text-secondary" style="font-size: 3.5rem;">
                    <i class="bi bi-basket3-fill"></i>
                </div>
            </div>
            <div class="card-footer text-center">
                <?php
                if($_SESSION['rol'] == 2){ ?>
                    <a class="btn btn-primary w-100" href="/softkit/pages/distribucion.php" role="button">
                    Visitar Distribucion
                    <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                <?php }else{ ?>
                    <button disabled class="btn btn-primary w-100">
                    Visitar Distribucion
                    <i class="bi bi-lock-fill"></i>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-warning fw-bold">
                Analisis De Datos 
            </div>
            <div class="card-body">
                <p class="card-text">
                    El sistema elabora analisis de los datos guardados y genera informes para enviar por correo o para descargar
                </p>
                <div class="text-center text-secondary" style="font-size: 3.5rem;">
                    <i class="bi bi-bar-chart-line-fill"></i>
                </div>
            </div>
            <div class="card-footer text-center">
                <?php
                if($_SESSION['rol'] == 2){ ?>
                    <a class="btn btn-primary w-100" href="/softkit/pages/analisis.php" role="button">
                    Visitar Analisis
                    <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                <?php }else{ ?>
                    <button disabled class="btn btn-primary w-100">
                    Visitar Analisis
                    <i class="bi bi-lock-fill"></i>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>    
    </div>
    <div class="row">
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-warning fw-bold">
                Registro De Productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Todo nuevo ingreso de productos al almacén fisico debe ser registrado seguidamente en el sistema
                </p>
                <div style="font-size: 3.5rem;" class="text-center text-secondary">
                    <i class="bi bi-clipboard2-plus-fill"></i>
                </div>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-primary w-100" href="/softkit/pages/nuevo.php" role="button">
                    Visitar Registro
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-warning fw-bold">
                Copias De Seguridad
            </div>
            <div class="card-body">
                <p class="card-text">
                    Finalizado el registro de los datos, el sistema crea y almacena copias de seguridad de la base de datos  
                </p>
                <div class="text-center text-secondary" style="font-size: 3.5rem;">
                    <i class="bi bi-server"></i>
                </div>
            </div>
            <div class="card-footer text-center">
            <?php
            if($_SESSION['rol'] == 2){ ?>
                <a class="btn btn-primary w-100" href="/softkit/pages/backup.php" role="button">
                    Visitar Backup
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            <?php }else{ ?>
                <button disabled class="btn btn-primary w-100">
                    Visitar Backup
                    <i class="bi bi-lock-fill"></i>
                </button>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header text-center fs-6 bg-warning fw-bold">
                Administrar Trabajadores
            </div>
            <div class="card-body">
                <p class="card-text">
                    Administrar el registro de nuestros trabajadores ayudará en la distribución de sus asignaciones
                </p>
                <div class="text-center text-secondary" style="font-size: 3.5rem;">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>
            <div class="card-footer text-center">
            <?php
                if($_SESSION['rol'] == 2){ ?>
                <a class="btn btn-primary w-100" href="/softkit/pages/trabajadores.php" role="button">
                    Visitar Trabajadores
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            <?php }else{ ?>
                <button disabled class="btn btn-primary w-100">
                    Visitar Trabajadores
                    <i class="bi bi-lock-fill"></i>
                </button>
            <?php } ?>
            </div>
        </div>
    </div>
    </div>
</div>



</body>
</html>