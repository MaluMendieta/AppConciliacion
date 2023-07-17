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
    $num = $_POST['num'];

    
    $sql = "INSERT INTO abogado (Id_Abogado, Nombre, Apellido, Celular, Correo, DNI, Dirección, n_registro) 
    VALUES ('$id', '$nombre', '$apellido', '$telefono', '$correo', '$DNI', '$direccion', '$num')";
    $query_insert = $conector->query($sql);

    if ($query_insert) {
        // Redirigir a la página principal después de la inserción exitosa
        header("Location: crudA.php");
        exit;
    } else {
        // Manejar el caso en que la inserción falle
        echo "Error al insertar el abogado: " . $conector->error;
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Abogados-</title>
    <link rel="stylesheet" href="st.css">
</head>
<body>

<?php
include 'sidebar.php';
?>

    <h1>Crear Usuario de Abogado</h1>
    <form method="POST" action="">
        <label for="id">ID abogado:</label>
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
        <label for="num">Numero de Registro :</label>
        <input type="number" id="num" name="num" required><br>


        <button type="submit">Guardar</button>
    </form>
</body>
</html>
