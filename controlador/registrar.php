<?php
if (isset($_POST['btnregistrar'])) {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento_identidad = $_POST['documento_identidad'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    // Manejo de imagen
    $imagen = $_FILES['imagen']['name'];
    $ruta = 'imagenes_clientes/' . $imagen;  // Carpeta donde se guardarán las imágenes

    // Mover archivo a la carpeta 'uploads'
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
        // Insertar los datos en la base de datos
        $sql = $conexion->query("INSERT INTO empleados (nombre, apellido, documento_identidad, direccion, telefono, foto) 
                                 VALUES ('$nombre', '$apellido', '$documento_identidad', '$direccion', '$telefono', '$ruta')");
        if ($sql) {
            echo "<div class='alert alert-success'>Empleado registrado correctamente</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al registrar empleado</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error al subir la imagen</div>";
    }
}
