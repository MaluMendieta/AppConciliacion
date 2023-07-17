
<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor, $usuario, $password, $basededatos);

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $idInvitado = $_GET['id'];

    // Verificar si el abogado existe en la base de datos
    $consulta = "SELECT * FROM invitado WHERE Id_Invitado = $idInvitado";
    $resultado = mysqli_query($conector, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Eliminar el abogado de la base de datos
        $eliminacion = "DELETE FROM invitado WHERE Id_Invitado = $idInvitado";
        $resultadoEliminacion = mysqli_query($conector, $eliminacion);

        if ($resultadoEliminacion) {
            // Redirigir a la página principal después de la eliminación exitosa
            header("Location: crudInvitado.php");
            exit;
        } else {
            // Manejar el caso en que la eliminación falle
            echo "Error al eliminar el invitado: " . mysqli_error($conector);
        }
    } else {
        // Manejar el caso en que el abogado no exista en la base de datos
        echo "El invitado no existe.";
    }
} else {
    // Manejar el caso en que no se haya proporcionado un ID válido en la URL
    echo "ID de invitado no válido.";
}
?>
