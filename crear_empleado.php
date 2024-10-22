<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos para reducir el ancho de la tabla */
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
        .btn-regresar {
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

        .btn-regresar:hover {
            background-color: #c82333; 
        }
    </style>

</head>

<body>

    <h1 class="text-center text-secondary font-weight-bold p-4">Crear Empleado</h1>

    <?php
    require "modelo/conexion.php";
    require "controlador/registrar.php";
    $sql = $conexion->query("SELECT * FROM empleados");
    ?>

    <div class="p-3 table-responsive text-center">
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar nuevo usuario
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Registro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <input type="text" class="form-control mb-2" name="nombre" placeholder="Nombre" required>
                            <input type="text" class="form-control mb-2" name="apellido" placeholder="Apellido" required>
                            <input type="text" class="form-control mb-2" name="documento_identidad" placeholder="Documento de Identidad" required>
                            <input type="text" class="form-control mb-2" name="direccion" placeholder="Dirección" required>
                            <input type="text" class="form-control mb-2" name="telefono" placeholder="Teléfono" required>
                            <input type="file" class="form-control mb-2" name="imagen" required>
                            <input type="submit" value="Registrar" name="btnregistrar" class="form-control btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Documento Identidad</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <th scope="row"><?php echo $datos->id; ?></th>
                                <td><?php echo $datos->nombre; ?></td>
                                <td><?php echo $datos->apellido; ?></td>
                                <td><?php echo $datos->documento_identidad; ?></td>
                                <td><?php echo $datos->direccion; ?></td>
                                <td><?php echo $datos->telefono; ?></td>
                                <td><img src="<?php echo $datos->foto; ?>" alt="Foto del empleado"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Botón "Volver al menú principal" más pequeño -->
        <a href="index.php" class="btn-regresar">Volver al menú principal</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

