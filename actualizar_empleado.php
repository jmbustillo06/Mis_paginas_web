<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .table {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            font-size: 1rem;
        }

        th,
        td {
            padding: 0.5rem;
        }

        img {
            width: 50px;
            height: auto;
        }

        /* Estilos para el botón "Volver al menú principal" */
        .btn-regresar4 {
            display: block;
            margin: 20px auto;
            padding: 5px 10px; 
            font-size: 14px;   
            background-color: #dc3545; 
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            width: 200px; 
        }

        .btn-regresar4:hover {
            background-color: #c82333; /* Color rojo más oscuro al pasar el mouse */
        }
    </style>
    <!-- Incluye el CSS y JS de SweetAlert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>

    <h1 class="text-center text-secondary">Actualizar empleado</h1>

    <?php
    session_start();
    require "modelo/conexion.php";

    if (isset($_SESSION['mensaje'])) {
        echo "<script>
                swal({
                    title: 'Datos actualizados',
                    text: '" . $_SESSION['mensaje'] . "',
                    icon: 'success',
                    button:'Aceptar',
                });
              </script>";
        unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
    }

    $sql = $conexion->query("SELECT * FROM empleados");
    ?>

    <div class="p-3 table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Documento Identidad</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <th scope="row"><?php echo $datos->id; ?></th>
                        <td><?php echo $datos->nombre; ?></td>
                        <td><?php echo $datos->apellido; ?></td>
                        <td><?php echo $datos->documento_identidad; ?></td>
                        <td><?php echo $datos->direccion; ?></td>
                        <td><?php echo $datos->telefono; ?></td>
                        <td><img src="<?php echo $datos->foto; ?>" width="100" alt="Foto del empleado"></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo $datos->id; ?>">
                                Actualizar
                            </button>

                            <!-- Modal para editar -->
                            <div class="modal fade" id="editarModal<?php echo $datos->id; ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editarModalLabel">Actualizar Empleado</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="controlador/actualizar.php" enctype="multipart/form-data" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $datos->id; ?>"> <!-- Campo oculto para el ID -->
                                                <input type="text" class="form-control mb-2" name="nombre" placeholder="Nombre" value="<?php echo $datos->nombre; ?>" required>
                                                <input type="text" class="form-control mb-2" name="apellido" placeholder="Apellido" value="<?php echo $datos->apellido; ?>" required>
                                                <input type="text" class="form-control mb-2" name="documento_identidad" placeholder="Documento de Identidad" value="<?php echo $datos->documento_identidad; ?>" required>
                                                <input type="text" class="form-control mb-2" name="direccion" placeholder="Dirección" value="<?php echo $datos->direccion; ?>" required>
                                                <input type="text" class="form-control mb-2" name="telefono" placeholder="Teléfono" value="<?php echo $datos->telefono; ?>" required>
                                                <input type="file" class="form-control mb-2" name="imagen">
                                                <input type="submit" value="Actualizar" name="btnactualizar" class="form-control btn btn-success">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Botón "Volver al menú principal" -->
    <a href="index.php" class="btn-regresar4">Volver al menú principal</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
