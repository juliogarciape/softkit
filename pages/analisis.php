<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es-PE">
<head>
    <?php require("../partials/head.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>
<body class="bg-main">

<?php require("../partials/header.php"); ?>

<div class="w-75 m-auto mt-5">
<div class="card shadow-sm rounded-3">
    <div class="card-header text-center p-3 text-white bg-dark">
        <h5 class="card-title mb-0">
            <i class="bi bi-house-heart-fill"></i>
            184 productos actualmente en almacén
        </h5>
    </div>
    <div class="card-body d-flex p-3">
        <div class="w-100 d-flex justify-content-center">
            <button type="button" class="btn btn-primary w-75">Correo de Gerencia <i class="bi bi-envelope-fill"></i></button>
        </div>
        <div class="w-100 d-flex justify-content-center">
            <button type="button" class="btn btn-warning w-75">Generar Informe (PDF) <i class="bi bi-file-earmark-pdf-fill"></i></button>
        </div>
    </div>
</div>
</div>

<div class="container-fluid mt-5 mb-5">
    <div class="row mb-5">
        <div class="col-4">
            <canvas class="shadow-sm bg-white p-2 rounded-3" id="grafico6" width="100%" height="50"></canvas>
        </div>
        <div class="col-4">
            <canvas class="shadow-sm bg-white p-2 rounded-3" id="grafico2" width="100%" height="50"></canvas>
        </div>
        <div class="col-4">
            <canvas class="shadow-sm bg-white p-2 rounded-3" id="grafico3" width="100%" height="50"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <canvas class="shadow-sm bg-white p-2 rounded-3" id="grafico4" width="100%" height="50"></canvas>
        </div>
        <div class="col-4">
            <canvas class="shadow-sm bg-white p-2 rounded-3" id="grafico5" width="100%" height="50"></canvas>
        </div>
        <div class="col-4">
            <canvas class="shadow-sm bg-white p-2 rounded-3" id="grafico1" width="100%" height="50"></canvas>
        </div>
    </div>
</div>


<script>

const ctx1 = document.getElementById('grafico1').getContext('2d');
const ctx2 = document.getElementById('grafico2').getContext('2d');
const ctx3 = document.getElementById('grafico3').getContext('2d');
const ctx4 = document.getElementById('grafico4').getContext('2d');
const ctx5 = document.getElementById('grafico5').getContext('2d');
const ctx6 = document.getElementById('grafico6').getContext('2d');


const grafico1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ["día 3","día 7","día 10","día 14","día 17","día 21",'día 24'],
        datasets: [{
            label: 'Días de ingreso de productos - ultimo mes del año 2022',
            data: [110,112,114,119,114,115,107,112],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});

const grafico2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['8 productos por kit', '7 productos por kit','10 productos por kit',  '12 productos por kit'],
        datasets: [{
            data: [50,25,10,5],
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
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});


const grafico3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ['1° trimestre','2° trimestre','3° trimestre'],
        datasets: [
            {
                label: 'Kits alimenticios donados - trimestres del año 2022',
                data: [355,335,349],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});

const grafico4 = new Chart(ctx4, {
    type: 'radar',
    data: {
        labels: ['Primor','P&G','Alicorp','Nestlé','Gloria'],
        datasets: [{
            label: 'Marcas de productos más repetidas dentro de un kit',
            data: [2,3,4,3,5],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});

const grafico5 = new Chart(ctx5, {
    type: 'line',
    data: {
        labels: ['Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre'],
        datasets: [{
            label: 'Kits alimenticios donados - ultimos meses del año 2022',
            data: [125, 120, 127, 125, 115],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});

const grafico6 = new Chart(ctx6, {
    type: 'line',
    data: {
        labels: ['día 3', 'día 7', 'día 10','día 14','día 17','día 21','día 24'],
        datasets: [{
            label: 'Cantidad de kits armados - ultimo mes del año 2022',
            data: [13,15,14,16,12,13,15],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});


</script>
</body>
</html>