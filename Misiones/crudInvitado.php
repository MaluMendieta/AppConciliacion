<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor,$usuario,$password,$basededatos);
$query = "SELECT * FROM invitado";
$result = mysqli_query($conector, $query);
$invitados = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ingeniería de Software</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="logo1.jpg" />
</head>
<body>
<?php
include 'sidebar.php';
?>
<div class="tabla">
    <h2>INFORMACION DE LOS INVITADOS</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>DNI</th>
            <th>Dirrecion</th>
            <th>Opciones</th>
        </tr>
        <?php foreach ($invitados as $invitado): ?>
            <tr>
                <td><?php echo $invitado['Id_Invitado']; ?></td>
                <td><?php echo $invitado['Nombre']; ?></td>
                <td><?php echo $invitado['Apellido']; ?></td>
                <td><?php echo $invitado['Celular']; ?></td>
                <td><?php echo $invitado['Correo']; ?></td>
                <td><?php echo $invitado['DNI']; ?></td>
                <td><?php echo $invitado['Dirección']; ?></td>
                <td>
                    <div class="actions">
                        <a class="editar" href="editarI.php?id=<?php echo $invitado['Id_Invitado']; ?>">Editar</a>
                        <a class="eliminar" href="eliminarI.php?id=<?php echo $invitado['Id_Invitado']; ?>">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="agregar">
        <a href="agregarI.php" class="boton-agregar">Agregar datos</a>
    </div>
</div>
  
</body>
</html>
