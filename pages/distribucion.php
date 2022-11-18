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
    require("../assets/modals/kitDetails.php");

    $amount = getAmountProducts();
    $data = listAllKits();
    $processedData = listAllProcessedKits();

?>

<div class="w-75 m-auto mt-5">
<div class="card shadow-sm rounded-3">
    <div class="card-header text-center p-3 text-white bg-dark">
        <h5 class="card-title mb-0">
            <i class="bi bi-house-heart-fill"></i>
            <?php echo $amount; ?> productos actualmente en almacén
        </h5>
    </div>
    <div class="card-body d-flex p-3">
        <div class="w-100 d-flex justify-content-center">
            <a class="btn btn-primary w-75" data-bs-toggle="modal" data-bs-target="#exampleModal" href="?nuevo=registro" role="button">
                Generar Nueva Distribución 
                <i class="bi bi-gear-wide-connected"></i>
            </a>
        </div>
        <div class="w-100 d-flex justify-content-center">
            <a class="btn btn-danger w-75" data-bs-toggle="modal" data-bs-target="#exampleModalDel">
                Eliminar Todas las Propuestas
                <i class="bi bi-trash3"></i>
            </a>
        </div>
    </div>
</div>
</div>

<div class="container-fluid mt-5 mb-5">

<div style="width: max-content;" class="p-3 shadow-sm sub-title px-4 text-center bg-warning">
    <h5 class="mb-0"><i class="bi bi-robot"></i> Propuestas de distribución generadas</h5>
</div>

<table id="table_id" class="display table mt-4 mb-4 table-bordered">
    <thead class="table-dark text-center">
        <tr class="text-center align-middle">
            <th>ID</th>
            <th>Originado por</th>
            <th>Productos X Kits</th>
            <th>Valor del Kit (S/)</th>
            <th>Fecha de Creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value) { ?>
            <tr class="text-center align-middle">
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['usuario']; ?></td>
                <td><?php echo $value['productos']; ?></td>
                <td>S/. <?php echo $value['total']; ?></td>
                <td><?php echo $value['fechaCreacion']; ?></td>
                <td class="d-flex justify-content-center gap-3">
                    
                    <button type="button" onClick="verDetalles(<?php echo $value['id']; ?>)" class="btn btn-primary btn-sm">Ver detalles <i class="bi bi-eye"></i></button>
                    
                    <a data-id="<?php echo $value['id']; ?>" class="btn btn-warning btn-sm" id="buttonProcess" data-bs-toggle="modal" data-bs-target="#processModal">Autorizar <i class="bi bi-check-square"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<div style="width: max-content;" class="p-3 shadow-sm sub-title px-4 text-center bg-warning">
    <h5 class="mb-0"><i class="bi bi-bag-check-fill"></i> Historial de propuestas autorizadas</h5>
</div>

<table id="table_id" class="display table mt-4 table-bordered">
    <thead class="table-dark text-center mx-auto">
        <tr class="text-center align-middle">
            <th>ID</th>
            <th>Originado por</th>
            <th>Productos X Kits</th>
            <th>Valor del Kit (S/)</th>
            <th>Fecha de Creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processedData as $value) { ?>
            <tr class="text-center align-middle">
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['usuario']; ?></td>
                <td><?php echo $value['productos']; ?></td>
                <td>S/. <?php echo $value['total']; ?></td>
                <td><?php echo $value['fechaCreacion']; ?></td>
                <td class="d-flex justify-content-center gap-3">

                    <button type="button" onClick="verDetalles(<?php echo $value['id']; ?>)" class="btn btn-primary btn-sm">Ver detalles <i class="bi bi-eye"></i></button>
                    
                    <button class="btn btn-secondary btn-sm">Generar Informe </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<div class="modal fade" id="exampleModalDel" tabindex="-1" aria-labelledby="exampleModalDel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar las propuestas generadas?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-info-circle-fill"></i> Recuerda: Eliminará los datos de la tabla de propuestas generadas, pero no editará el historial de propuestas procesadas </p>
      </div>
        <form method="POST" action="/softkit/controller/index.php">   
            <div class="modal-footer">
                <input type="hidden" value="ok" name="remove-kits">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="processModal" tabindex="-1" aria-labelledby="processModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea autorizar esta propuesta generada?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-info-circle-fill"></i> Recuerda: Al confirmar se actualizará el stock de los productos y la propuesta se almacenará en el historial </p>
      </div>
        <form method="POST" action="/softkit/controller/index.php">   
            <div class="modal-footer">
                <input type="hidden" name="process-kit" id="process-kit">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-house-heart-fill"></i> Solicitar Distribución</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="/softkit/controller/index.php">   
                <div class="modal-body row gap-3">
                    <div class="form-group">
                        <label for="kits" class="form-label">¿Cuántos kits se van a repartir?</label>
                        <input type="number" class="form-control" id="kits" name="kits" required>
                    </div>  
                    <div class="form-group">
                        <label for="productos" class="form-label">¿Cuántos tipos de producto debe contener cada kit?</label>
                        <input type="number" class="form-control" id="productos" name="productos" required>
                    </div>  
                    <div class="form-group">
                        <label for="cantidad" class="form-label">¿Cuántos productos habrán por cada tipo?</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>  
                    <div class="form-group">
                        <label for="propuesta" class="form-label">¿Cuántas propuestas desea generar? <span class="badge rounded-pill bg-warning " value="1" id="rangePropuesta">1</span></label>
                        <input type="range" class="form-range" min="1" max="10" value="1" id="propuesta" name="propuesta" onchange="updateTextInput(this.value);" required>
                    </div> 
                <div class="modal-footer">
                    <input type="hidden" value="ok" name="generate-kits">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Generar <i class="bi bi-check-lg"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>  
<script type="text/javascript">
    $(document).on("click", "#buttonProcess", function () {
        var Id = $(this).data('id');
        $(".modal-footer #process-kit").val( Id );
    });

    function updateTextInput(val) {
        document.getElementById('rangePropuesta').innerHTML=val; 
    }
    
    function verDetalles(valor){
        $.ajax({
            url:'../assets/modals/getKitDetails.php',
            type:'POST',
            data:{
                id:valor
            },
            success:function(data){
                console.log(data.detail);
                let header=`
                    <div class="row">
                        <div class="col">
                            <label for="productos" class="form-label"><b>Generado por</b></label><br>
                            <label for="productos" class="form-label">`+data.detail[0].usuario+`</label>
                        </div>
                        <div class="col">
                            <label for="productos" class="form-label"><b>Fecha de Creación</b></label><br>
                            <label for="productos" class="form-label">`+data.detail[0].fechaCreacion+`</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="productos" class="form-label"><b>Productos</b></label><br>
                            <label for="productos" class="form-label">`+data.detail[0].productos+`</label>
                        </div>
                        <div class="col">
                            <label for="productos" class="form-label"><b>Total</b></label><br>
                            <label for="productos" class="form-label">S/. `+data.detail[0].total+`</label>
                        </div>
                    </div>`;
                let products='';
                for (let i = 0; i < data.detail.length; i++) {
                    products+=
                    `
                    <tr class="text-center align-middle">
                        <td>`+data.detail[i].descripcion+`</td>
                        <td>S/. `+data.detail[i].precioUnitario+`</td>
                        <td>`+data.detail[i].productos+`</td>
                        <td>S/. `+data.detail[i].subtotal+`</td>
                    </tr>
                    `;
                }
                
                document.getElementById("header-list").innerHTML=header;
                document.getElementById("body-list").innerHTML=products;
            },
            error:function(e){
                console.error(e);
            }
        }).then($('#staticBackdrop').modal('show'))
    }
</script>
</body>
</html>