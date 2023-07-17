
<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor, $usuario, $password, $basededatos);

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $idAbogado = $_GET['id'];

    // Verificar si el abogado existe en la base de datos
    $consulta = "SELECT * FROM abogado WHERE Id_Abogado = $idAbogado";
    $resultado = mysqli_query($conector, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Eliminar el abogado de la base de datos
        $eliminacion = "DELETE FROM abogado WHERE Id_Abogado = $idAbogado";
        $resultadoEliminacion = mysqli_query($conector, $eliminacion);

        if ($resultadoEliminacion) {
            // Redirigir a la página principal después de la eliminación exitosa
            header("Location: crudA.php");
            exit;
        } else {
            // Manejar el caso en que la eliminación falle
            echo "Error al eliminar el abogado: " . mysqli_error($conector);
        }
    } else {
        // Manejar el caso en que el abogado no exista en la base de datos
        echo "El abogado no existe.";
    }
} else {
    // Manejar el caso en que no se haya proporcionado un ID válido en la URL
    echo "ID de abogado no válido.";
}
?>
