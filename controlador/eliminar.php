<?php
require "../modelo/conexion.php";

// Verificar si se ha pasado un ID por la URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Consulta SQL para eliminar el empleado
    $sql = $conexion->prepare("DELETE FROM empleados WHERE id = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        // Mostrar mensaje de éxito y regresar a la lista de empleados
        echo "<script>alert('Empleado eliminado correctamente'); window.location.href = '../eliminar_empleado.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el empleado: " . $conexion->error . "'); window.location.href = '../eliminar_empleado.php';</script>";
    }

    // Cerrar la consulta
    $sql->close();
} else {
    echo "<script>alert('No se proporcionó un ID válido.'); window.location.href = '../vista/eliminar_empleados.php';</script>";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
