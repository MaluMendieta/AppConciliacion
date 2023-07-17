<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor,$usuario,$password,$basededatos);
$query = "SELECT * FROM solicitante";
$result = mysqli_query($conector, $query);
$solicitantes = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <h2>INFORMACION DE LOS SOLICITANTES</h2>
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
        <?php foreach ($solicitantes as $solicitante): ?>
            <tr>
                <td><?php echo $solicitante['Id_Solicitante']; ?></td>
                <td><?php echo $solicitante['Nombre']; ?></td>
                <td><?php echo $solicitante['Apellido']; ?></td>
                <td><?php echo $solicitante['Celular']; ?></td>
                <td><?php echo $solicitante['Correo']; ?></td>
                <td><?php echo $solicitante['DNI']; ?></td>
                <td><?php echo $solicitante['Dirección']; ?></td>
                <td>
                    <div class="actions">
                        <a class="editar" href="editarS.php?id=<?php echo $solicitante['Id_Solicitante']; ?>">Editar</a>
                        <a class="eliminar" href="eliminarS.php?id=<?php echo $solicitante['Id_Solicitante']; ?>">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="agregar">
        <a href="agregarS.php" class="boton-agregar">Agregar datos</a>
    </div>
</div>
  
</body>
</html>
