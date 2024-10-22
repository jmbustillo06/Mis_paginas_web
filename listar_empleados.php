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
        width: 90%; /* Aumentado el ancho de la tabla al 90% */
        max-width: 1000px; /* Aumentado el ancho máximo a 1000px */
        margin: auto; /* Centra la tabla */
        font-size: 1rem; /* Tamaño de la fuente */
    }

    th,
    td {
        padding: 0.5rem; /* Aumentar padding para más espacio */
    }

    img {
        width: 50px; /* Ajustar el tamaño de las imágenes */
        height: auto; /* Mantiene la relación de aspecto */
    }

    /* Estilos para el botón "Volver al menú principal" */
    .btn-volver3 {
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

        .btn-volver3:hover {
            background-color: #c82333; 
        }
</style>

</head>

<body>

    <h1 class="text-center text-secondary font-weight-bold p-4">Listado de  empleado</h1>

    <?php
    require "modelo/conexion.php";
    $sql = $conexion->query("SELECT * FROM empleados");
    ?>

    <div class="p-3 table-responsive text-center">

        <!-- Tabla empleados -->
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
<!-- Botón para volver al index.php -->
<form action="index.php">
            <button class="btn-volver3" type="submit">Volver al menú principal</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>