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
    
    $data = listAllProducts();
    $amount = getAmountProducts();

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
            <a class="btn btn-primary w-75 text-white" href="/softkit/pages/nuevo.php">
                Nuevo Registro 
                <i class="bi bi-plus-square"></i>
            </a>
        </div>
        <div class="w-100 d-flex justify-content-center">
            <button class="btn btn-warning w-75">
                Exportar Datos (CSV) 
                <i class="bi bi-file-earmark-ruled-fill"></i>
            </button>
        </div>
    </div>
</div>
</div>


<div class="container-fluid mt-5 mb-5">
<table id="table_id" class="display table pt-4 table-bordered">
    <thead class="table-dark text-center mx-auto">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Producto</th>
            <th class="text-center">Precio Unitario</th>
            <th class="text-center">Stock</th>
            <th class="text-center">Marca</th>
            <th class="text-center">Peso</th>
            <th class="text-center">Fecha Ingreso</th>
            <th class="text-center">Acción</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php foreach ($data as $value) { ?>
            <tr class="text-center align-middle">
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['descripcion']; ?></td>
                <td>S/. <?php echo $value['precioUnitario']; ?></td>
                <td><?php echo $value['stock']; ?></td>
                <td><?php echo $value['marca']; ?></td>
                <td><?php echo $value['peso']." Kg"; ?></td>
                <td><?php echo $value['fechaIngreso']; ?></td>
                <td class="d-flex justify-content-center gap-3">
                    <a href="?id=<?php echo $value['id_producto']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar <i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalDel">Eliminar <i class="bi bi-trash3"></i></a>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-house-heart-fill"></i> Almacen Fundacion Calma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="/softkit/controller/index.php">   
                <div class="modal-body row gap-3">
                    <div class="form-group">
                        <label for="nombreProducto" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
                    </div>
                    <div class="form-group">
                        <label for="precioProducto" class="form-label">Precio de compra</label>
                        <input type="number" class="form-control" id="precioProducto" name="precioProducto" required>
                    </div>                
                    <div class="form-group">
                        <label for="descripcionProducto" class="form-label">Descripción detallada</label>
                        <input type="text" class="form-control" id="descripcionProducto" name="descripcionProducto" required>
                    </div>
                    <div class="form-group">
                        <label for="stockProductos" class="form-label">Stock Ingresado</label>
                        <input type="number" class="form-control" id="stockProductos" name="stockProductos" required>
                    </div>
                    <div class="form-group">
                        <label for="codigoCompra" class="form-label">Código de Compra</label>
                        <input type="text" class="form-control" id="codigoCompra" name="codigoCompra" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaIngreso" class="form-label">Fecha de Ingreso</label>
                        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" value="ok" name="register-product">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar Datos <i class="bi bi-check-lg"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>  



<script>

$(document).ready( function () {
    $('#table_id').DataTable({
        language: {
        "decimal": "",
        "emptyTable": "No hay productos registrados",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ productos",
        "infoEmpty": "Mostrando 0 to 0 of 0 productos",
        "infoFiltered": "(Filtrado de _MAX_ total productos)",
        "infoPostFix": "",
        "thousands": ",",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar producto:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
        },
    });
} );

</script>
</body>
</html>