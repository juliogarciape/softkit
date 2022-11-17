<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require("../partials/head.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
</head>
<body class="bg-main">

<?php require("../partials/header.php"); ?>

<div class="container mt-5 d-flex justify-content-between">
    <button type="button" class="btn btn-primary">Filtrar Información <i class="bi bi-funnel-fill"></i></button>
    <button type="button" class="btn btn-warning">Exportar Informe (.pdf) <i class="bi bi-file-earmark-pdf-fill"></i></button>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <canvas id="myChart" width="100%" height="100%"></canvas>
        </div>
        <div class="col">
            <canvas id="myChart" width="100%" height="100%"></canvas>
        </div>
        <div class="col">
            <canvas id="myChart" width="100%" height="100%"></canvas>
        </div>
    </div>
</div>

// validación de graficos - Agregar email automatico y envio rapido a gerencia y 




<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>
</html>