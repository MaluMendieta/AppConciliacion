<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor, $usuario, $password, $basededatos);

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idSolicitante = $_POST['id'];
    $nuevoNombre = $_POST['nombre'];
    $nuevoApellido = $_POST['apellido'];
    $nuevoCelular = $_POST['celular'];
    $nuevoCorreo = $_POST['correo'];

    // Actualizar los datos del abogado en la base de datos
    $query = "UPDATE solicitante SET Nombre = '$nuevoNombre', Apellido = '$nuevoApellido', Celular = '$nuevoCelular', Correo = '$nuevoCorreo' WHERE Id_Solicitante = $idSolicitante";
    $resultado = mysqli_query($conector, $query);

    if ($resultado) {
        // Redirigir a la página principal después de la edición exitosa
        header("Location: crudSolicitante.php");
        exit;
    } else {
        // Manejar el caso en que la edición falle
        echo "Error al editar el solicitante: " . mysqli_error($conector);
    }
} else {
    // Obtener el ID del abogado a editar desde la URL
    $idSolicitante = $_GET['id'];

    // Obtener los datos del abogado de la base de datos
    $query = "SELECT * FROM solicitante WHERE Id_Solicitante = $idSolicitante";
    $resultado = mysqli_query($conector, $query);
    $solicitante = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ingeniería de Software - Editar Solicitante</title>
    <link rel="stylesheet" type="text/css" href="st.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="formulario">
        
        <h1>Editar Solicitante</h1>
        <form method="POST" action="editarS.php">
            <input type="hidden" name="id" value="<?php echo $solicitante['Id_Solicitante']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $solicitante['Nombre']; ?>" required>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $solicitante['Apellido']; ?>" required>
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" value="<?php echo $solicitante['Celular']; ?>" required>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $solicitante['Correo']; ?>" required>
           
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
