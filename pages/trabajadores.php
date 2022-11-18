<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es-PE">
<head>
    <?php require("../partials/head.php"); ?>
</head>
<body class="bg-main">

<?php 

    require("../partials/header.php"); 
    
    $data = [
        1 => [
            "id" => 1,
            "nombre" => "Diego Alonso",
            "apellido" => "Gonzales Gonzales",
            "correo" => "diegoalso@gmail.com",
            "rol" => "Trabajador"
        ],
        2 => [
            "id" => 2,
            "nombre" => "Renato",
            "apellido" => "Guierrez Vasquez",
            "correo" => "renatogod@gmail.com",
            "rol" => "Lider de Area"
        ],
        3 => [
            "id" => 3,
            "nombre" => "Jesus Benjamin",
            "apellido" => "Cancho Rosales",
            "correo" => "jes22cancho@gmail.com",
            "rol" => "Trabajador"
        ],
        4 => [
            "id" => 4,
            "nombre" => "Brayan Jair",
            "apellido" => "Vera Cabanillas",
            "correo" => "brayan12jair@gmail.com",
            "rol" => "Trabajador"
        ],
        5 => [
            "id" => 5,
            "nombre" => "Dalmiro",
            "apellido" => "Felix Rafael",
            "correo" => "dalmirofelix@gmail.com",
            "rol" => "Trabajador"
        ],
        6 => [
            "id" => 6,
            "nombre" => "Evilio Issac",
            "apellido" => "Ureta Reinalte",
            "correo" => "eviute@gmail.com",
            "rol" => "Trabajador"
        ],
        7 => [
            "id" => 7,
            "nombre" => "Gino Paolo",
            "apellido" => "Sanez Molina", 
            "correo" => "gpsanez@gmail.com",
            "rol" => "Lider de Area"
        ],
        8 => [
            "id" => 8,
            "nombre" => "Shande Omar",
            "apellido" => "Meza Cerrano",
            "correo" => "messitaomar@gmail.com",
            "rol" => "Trabajador"
        ],
    ]
    
?>


<div class="slide-trabajador w-100">
    <div class="row container-fluid align-items-center h-100 slide-content">
        <div class="col-7">
            <div class="glass p-4 text-white">
                <form class="row g-3" action="/softkit/controller/index.php" method="POST">
                    <div class="col-md-6">
                        <label for="nombreTrabajador" class="form-label fw-bold"><i class="bi bi-person-fill"></i> Nombre del Trabajador</label>
                        <input name="nombreTrabajador" type="text" class="form-control" id="nombreTrabajador" placeholder="Ejemplo: Juan Luis" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombreTrabajador" class="form-label fw-bold"><i class="bi bi-person-fill"></i> Apellido del Trabajador</label>
                        <input name="nombreTrabajador" type="text" class="form-control" id="nombreTrabajador" placeholder="Ejemplo: Lopez Aliaga" required>
                    </div>
                    <div class="col-md-6">
                        <label for="correoTrabajador" class="form-label fw-bold"><i class="bi bi-envelope-fill"></i> Correo Electrónico</label>
                        <input type="email" name="correoTrabajador" class="form-control" placeholder="Ejemplo: juanlopez@gmail.org" id="correoTrabajador" required>
                    </div>
                    <div class="col-md-6">
                        <label for="claveTrabajador" class="form-label fw-bold"><i class="bi bi-key-fill"></i> Clave del Trabajador</label>
                        <input type="text" class="form-control" id="claveTrabajador" name="claveTrabajador" placeholder="Ejemplo: juanluiz-softkit-2022" required>
                    </div>
                    <div class="col-12">
                        <label for="rolTrabajador" class="form-label fw-bold"><i class="bi bi-hammer"></i> Rol del Trabajador</label>
                        <select id="rolTrabajador" name="rolTrabajador" class="form-select" required>
                        <option selected value="">Selecciona rol</option>
                        <option value="lider">Lider del Area de Almacen</option>
                        <option value="trabajador">Trabajador del Almacen</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="register-worker" value="ok">
                        <button type="submit" class="btn w-100 btn-primary">Registrar Trabajador</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-5">
            <div class="row">
                <div class="col-12 d-grid justify-content-center">
                    <img src="/softkit/assets/logo-calma.png" width="350">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt-5 mb-5">

<div style="width: max-content;" class="p-3 shadow-sm sub-title px-4 text-center bg-warning">
    <h5 class="mb-0"><i class="bi bi-person-fill"></i> Administración de Trabajadores</h5>
</div>

<table id="table_ids" class="mt-4 bg-white display table pt-4 table-bordered">
    <thead class="table-dark text-center mx-auto">
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo Electrónico</th>
            <th>Rol de Trabajo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value) { ?>
            <tr class="text-center align-middle">
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['nombre']; ?></td>
                <td><?php echo $value['apellido']; ?></td>
                <td><?php echo $value['correo']; ?></td>
                <td>
                    <?php
                    if($value['rol'] == 'Lider de Area'){
                        echo "<span class='btn btn-outline-primary'>".$value['rol']."</span>"; 
                    }else{
                        echo "<span class='btn'>".$value['rol']."</span>"; 
                    }
                    ?>
                </td>
                <td class="d-flex justify-content-center gap-3">
                    <a href="?id=<?php echo $value['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar <i class="bi bi-pencil-square"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar este trabajador del registro?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-info-circle-fill"></i> Recuerda: Este trabajador ya no tendrá ningún acceso al sistema web de control de almacenes</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar Trabajador <i class="bi bi-trash3"></i></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-fill"></i> Editar Trabajador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="/softkit/controller/index.php">   
                <div class="modal-body row gap-3">
                    <div class="form-group">
                        <label for="nombreProducto" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="Diego Alonso" required>
                    </div>
                    <div class="form-group">
                        <label for="precioProducto" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="Gonzales Gonzales" required>
                    </div>                
                    <div class="form-group">
                        <label for="descripcionProducto" class="form-label">Correo Electrónico	</label>
                        <input type="text" class="form-control" id="descripcionProducto" name="descripcionProducto" value="diegoalso@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="proveedorKit" class="form-label">Rol de Trabajo</label>
                        <select id="proveedorKit" name="proveedorKit" class="form-select" required>
                        <option selected value="">Trabajador</option>
                        <option value="INSUMOS & SOLUCIONES S.A.C.">INSUMOS & SOLUCIONES S.A.C.</option>
                        <option value="AMERICAN CATERING S.A.C.">AMERICAN CATERING S.A.C.</option>
                        <option value="CIMPO S.R.L.">CIMPO S.R.L.</option>
                        <option value="AMERICAN CATERING S.A.C.">AMERICAN CATERING S.A.C.</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="ok" name="register-product">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Actualizar Datos <i class="bi bi-check-lg"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>  


<script>

/*

Swal.fire(
    'Registro Exitoso',
    'Julio Garcia fue agregado como nuevo trabajador',
    'success'
)


$('#table_ids').DataTable({

});
*/
</script>
</body>
</html>