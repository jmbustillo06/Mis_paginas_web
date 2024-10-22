<?php
session_start(); // Inicia la sesión
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluye la conexión a la base de datos
require '../modelo/conexion.php';

if (isset($_POST['btnactualizar'])) {
    // Verificar que el ID esté presente
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        
        // Recibir datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $documento_identidad = $_POST['documento_identidad'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        // Manejo de imagen
        $imagen = $_FILES['imagen']['name'];
        $directorio = __DIR__ . '/../imagenes_clientes/'; // Ruta absoluta al directorio de imágenes
        $ruta = 'imagenes_clientes/' . $imagen; // Guardar ruta a carpeta

        // Variable para verificar si se ha actualizado la imagen
        $imagenActualizada = false;

        if (!empty($imagen)) {
            // Mover la imagen a la carpeta
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $imagen)) {
                $imagenActualizada = true; // Se actualizó la imagen
            } else {
                $_SESSION['mensaje'] = "Error al subir la imagen";
                header("Location: actualizar_empleado.php"); // Redirigir a la página específica
                exit;
            }
        }

        // Preparar la consulta
        if ($imagenActualizada) {
            // Guardar la ruta relativa en la base de datos
            $sql = $conexion->query("UPDATE empleados SET nombre='$nombre', apellido='$apellido', documento_identidad='$documento_identidad', direccion='$direccion', telefono='$telefono', foto='$ruta' WHERE id='$id'");
        } else {
            // Consulta para actualizar sin cambiar la imagen
            $sql = $conexion->query("UPDATE empleados SET nombre='$nombre', apellido='$apellido', documento_identidad='$documento_identidad', direccion='$direccion', telefono='$telefono' WHERE id='$id'");
        }

        // Verificar si la consulta se ejecutó correctamente
        if ($sql) {
            $_SESSION['mensaje'] = "La información del empleado se actualizó correctamente."; // Mensaje de éxito
        } else {
            $_SESSION['mensaje'] = "Error al actualizar empleado: " . $conexion->error; // Mensaje de error
        }

        // Redirigir a la página de actualización
        header("Location: ../actualizar_empleado.php"); // Redirigir a la página específica
        exit;
    } else {
        $_SESSION['mensaje'] = "No se ha proporcionado un ID de empleado válido.";
        header("Location: ../actualizar_empleado.php"); // Redirigir a la página específica
        exit;
    }
}
