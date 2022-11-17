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
    <div class="row mb-3">
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-box-seam-fill"></i>    
                Almacen de productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Toda la información sobre los productos registrados en el almacén puede ser vista desde aquí o puede ser exportada para formato CSV 
                </p>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-dark w-100" href="/softkit/pages/almacen.php" role="button">
                    Ir a Almacen Productos
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-basket3-fill"></i>
                Distribucion de productos
            </div>
            <div class="card-body">
                <p class="card-text">
                   Dependiendo de las necesidaes El sistema dependiendo de las  mediante un algoritmo genera propuestas de distribucion de los productos para el armado de kits alimenticios 
                </p>
            </div>
            <div class="card-footer text-center">
                <?php
                if($_SESSION['rol'] == 2){ ?>
                    <a class="btn btn-dark w-100" href="/softkit/pages/distribucion.php" role="button">
                    Ir a Distribucion Productos
                    <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                <?php }else{ ?>
                    <button disabled class="btn btn-dark w-100">
                    Ir a Distribucion Productos
                    <i class="bi bi-lock-fill"></i>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-bar-chart-line-fill"></i>
                Analisis de los datos guardados
            </div>
            <div class="card-body">
                <p class="card-text">
                    El sistema genera un analisis de los datos guardados y elabora informes para enviar mediante email al correo de gerencia
                </p>
            </div>
            <div class="card-footer text-center">
                <?php
                if($_SESSION['rol'] == 2){ ?>
                    <a class="btn btn-dark w-100" href="/softkit/pages/analisis.php" role="button">
                    Ir a Analisis Datos
                    <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                <?php }else{ ?>
                    <button disabled class="btn btn-dark w-100">
                    Ir a Analisis Datos
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
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-clipboard2-plus-fill"></i>    
                Registro de nuevos productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Cada ingreso de nuevos productos al almacén fisico debe ser registrado inmediatamente en la base de datos del sistema
                </p>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-dark w-100" href="/softkit/pages/almacen.php?nuevo=registro" role="button">
                    Ir a Nuevo Registro
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-server"></i>
                Copias de la base de datos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Una vez terminado los registros de los productos, el lider genera 
                    
                    el sistema genera y almacena una copia de seguridad (backup) de la base de datos
                </p>
            </div>
            <div class="card-footer text-center">
            <?php
            if($_SESSION['rol'] == 2){ ?>
                <a class="btn btn-dark w-100" href="/softkit/pages/backup.php" role="button">
                    Ir a Registro Backup
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            <?php }else{ ?>
                <button disabled class="btn btn-dark w-100">
                    Ir a Registro Backup
                    <i class="bi bi-lock-fill"></i>
                </button>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-person-fill"></i>
                Administrar trabajadores
            </div>
            <div class="card-body">
                <p class="card-text">
                    La Fundación Calma se encuentra en crecimiento por lo que administrar el registro de nuestros trabajadores ayudará en la distribución de tareas
                </p>
            </div>
            <div class="card-footer text-center">
            <?php
                if($_SESSION['rol'] == 2){ ?>
                <a class="btn btn-dark w-100" href="/softkit/pages/trabajadores.php" role="button">
                    Ir a Trabajadores
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            <?php }else{ ?>
                <button disabled class="btn btn-dark w-100">
                    Ir a Trabajadores
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