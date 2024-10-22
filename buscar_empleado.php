<?php
$host = "localhost";
$dbname = "empresa";
$username = "root";
$password = "Jorgebustillo123";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$empleado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    
    $id = intval($id);

    $sql = "SELECT * FROM empleados WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $empleado = $result->fetch_assoc();
    } else {
        echo "<script>alert('Empleado no encontrado');</script>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-container2">
    <h1 class="titulo-principal2">Buscar empleado por ID</h1>
    
    <form class="form-buscar-empleado2" action="" method="post">
        <label class="label-id" for="id">ID del empleado:</label>
        <input class="input-id" type="number" name="id" required>
        <button class="btn-buscar" type="submit">Buscar</button>
    </form>

    <?php if ($empleado): ?>
    <div class="employee-details2">
        <h2 class="titulo-detalles2">Detalles del empleado</h2>
        <p><strong>Código:</strong> <?php echo $empleado['codigo']; ?></p>
        <p><strong>Nombre:</strong> <?php echo $empleado['nombre']; ?></p>
        <p><strong>Apellido:</strong> <?php echo $empleado['apellido']; ?></p>
        <p><strong>Documento de Identidad:</strong> <?php echo $empleado['documento_identidad']; ?></p>
        <p><strong>Dirección:</strong> <?php echo $empleado['direccion']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $empleado['telefono']; ?></p>
        <p><strong>Foto:</strong></p>
        <img src="<?php echo $empleado['foto']; ?>" alt="Foto del empleado" style="width: 100px; height: auto;"> <!-- Aquí se muestra la foto -->
        
        <!-- Botón para volver al index.php -->
        <form action="index.php">
            <button class="btn-volver2" type="submit">Volver al menú principal</button>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>
