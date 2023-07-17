<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor, $usuario, $password, $basededatos);

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idInvitado = $_POST['id'];
    $nuevoNombre = $_POST['nombre'];
    $nuevoApellido = $_POST['apellido'];
    $nuevoCelular = $_POST['celular'];
    $nuevoCorreo = $_POST['correo'];

    // Actualizar los datos del abogado en la base de datos
    $query = "UPDATE invitado SET Nombre = '$nuevoNombre', Apellido = '$nuevoApellido', Celular = '$nuevoCelular', Correo = '$nuevoCorreo' WHERE Id_Invitado = $idInvitado";
    $resultado = mysqli_query($conector, $query);

    if ($resultado) {
        // Redirigir a la página principal después de la edición exitosa
        header("Location: crudInvitado.php");
        exit;
    } else {
        // Manejar el caso en que la edición falle
        echo "Error al editar el invitado: " . mysqli_error($conector);
    }
} else {
    // Obtener el ID del abogado a editar desde la URL
    $idInvitado = $_GET['id'];

    // Obtener los datos del abogado de la base de datos
    $query = "SELECT * FROM invitado WHERE Id_Invitado = $idInvitado";
    $resultado = mysqli_query($conector, $query);
    $invitado = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ingeniería de Software - Editar Invitado</title>
    <link rel="stylesheet" type="text/css" href="st.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="formulario">
        
        <h1>Editar Invitado</h1>
        <form method="POST" action="editarI.php">
            <input type="hidden" name="id" value="<?php echo $invitado['Id_Invitado']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $invitado['Nombre']; ?>" required>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $invitado['Apellido']; ?>" required>
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" value="<?php echo $invitado['Celular']; ?>" required>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $invitado['Correo']; ?>" required>
           
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
