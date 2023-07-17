<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor,$usuario,$password,$basededatos);
$query = "SELECT * FROM abogado";
$result = mysqli_query($conector, $query);
$abogados = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <h2>INFORMACION DE LOS ABOGADOS</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>DNI</th>
            <th>Dirrecion</th>
            <th>Numero de Registro</th>
            <th>Opciones</th>
        </tr>
        <?php foreach ($abogados as $abogado): ?>
            <tr>
                <td><?php echo $abogado['Id_Abogado']; ?></td>
                <td><?php echo $abogado['Nombre']; ?></td>
                <td><?php echo $abogado['Apellido']; ?></td>
                <td><?php echo $abogado['Celular']; ?></td>
                <td><?php echo $abogado['Correo']; ?></td>
                <td><?php echo $abogado['DNI']; ?></td>
                <td><?php echo $abogado['Dirección']; ?></td>
                <td><?php echo $abogado['n_registro']; ?></td>
                <td>
                    <div class="actions">
                        <a class="editar" href="editar.php?id=<?php echo $abogado['Id_Abogado']; ?>">Editar</a>
                        <a class="eliminar" href="eliminar.php?id=<?php echo $abogado['Id_Abogado']; ?>">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="agregar">
        <a href="agregar.php" class="boton-agregar">Agregar datos</a>
    </div>
</div>
  
</body>
</html>
