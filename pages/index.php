<?php

session_start(); 

if(isset($_SESSION['login']) && $_SESSION['login']) header("Location: /softkit/pages/dashboard.php");

else{ ?>

<!DOCTYPE html>
<html lang="es-PE">
<head>
    <?php require("../partials/head.php"); ?>
</head>
<body class="bg-main overflow-hidden">

<?php require("../partials/header.php"); ?>

<div class="slide w-100">
    <div class="row gap-5 align-items-center h-100 slide-content">
        <div class="col">
            <div class="glass p-4">
                <form class="row g-4" action="/softkit/controller/index.php" method="POST">
                    <div class="col-12">
                        <label for="correoTrabajador" class="form-label fw-bold text-white"><i class="bi bi-envelope-fill"></i> Correo Electrónico</label>
                        <input type="email" name="correoTrabajador" class="form-control" id="correoTrabajador" required>
                    </div>
                    <div class="col-12">
                        <label for="claveTrabajador" class="form-label fw-bold text-white"><i class="bi bi-key-fill"></i> Clave del Trabajador</label>
                        <input name="claveTrabajador" type="text" class="form-control" id="claveTrabajador" autocomplete="off" required>
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="login" value="ok">
                        <button type="submit" class="btn w-100 btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-12 d-grid justify-content-center">
                    <img src="/softkit/assets/logo-calma.png" width="350">
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php } ?>