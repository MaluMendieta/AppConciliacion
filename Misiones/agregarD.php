<?php

$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor,$usuario,$password,$basededatos);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $DNI = $_POST['dni'];
    $id = $_POST['id'];
    $direccion = $_POST['direccion'];
    $numG = $_POST['numG'];
    $numF = $_POST['numF'];

    
    $sql = "INSERT INTO director (Id_Director, Nombre, Apellido, Celular, Correo, DNI, Dirección, n_reg_general,n_reg_familia) 
    VALUES ('$id', '$nombre', '$apellido', '$telefono', '$correo', '$DNI', '$direccion', '$numG', '$numF')";
    $query_insert = $conector->query($sql);

    if ($query_insert) {
        // Redirigir a la página principal después de la inserción exitosa
        header("Location: crudDirector.php");
        exit;
    } else {
        // Manejar el caso en que la inserción falle
        echo "Error al insertar el director: " . $conector->error;
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Directores-</title>
    <link rel="stylesheet" href="st.css">
</head>
<body>

<?php
include 'sidebar.php';
?>

    <h1>Crear Usuario de Director</h1>
    <form method="POST" action="">
        <label for="id">ID director:</label>
        <input type="number" id="id" name="id" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br>

        <label for="telefono">Celular:</label>
        <input type="number" id="telefono" name="telefono"><br>

        <label for="dni">DNI:</label>
        <input type="number" id="dni" name="dni" required><br>
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion" required><br>
        <label for="numG">Numero de Registro General :</label>
        <input type="number" id="numG" name="numG" required><br>
        <label for="numF">Numero de Registro Familia :</label>
        <input type="number" id="numF" name="numF" required><br>


        <button type="submit">Guardar</button>
    </form>
</body>
</html>
