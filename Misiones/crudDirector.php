<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor,$usuario,$password,$basededatos);
$query = "SELECT * FROM director";
$result = mysqli_query($conector, $query);
$directores = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <h2>INFORMACION DE DIRECTORES</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>DNI</th>
            <th>Dirrecion</th>
            <th>Nro de Registro General</th>
            <th>Nro de Registro Familia</th>
            <th>Opciones</th>
        </tr>
        <?php foreach ($directores as $director): ?>
            <tr>
                <td><?php echo $director['Id_Director']; ?></td>
                <td><?php echo $director['Nombre']; ?></td>
                <td><?php echo $director['Apellido']; ?></td>
                <td><?php echo $director['Celular']; ?></td>
                <td><?php echo $director['Correo']; ?></td>
                <td><?php echo $director['DNI']; ?></td>
                <td><?php echo $director['Dirección']; ?></td>
                <td><?php echo $director['n_reg_general']; ?></td>
                <td><?php echo $director['n_reg_familia']; ?></td>
                <td>
                    <div class="actions">
                        <a class="editar" href="editarD.php?id=<?php echo $director['Id_Director']; ?>">Editar</a>
                        <a class="eliminar" href="eliminarD.php?id=<?php echo $director['Id_Director']; ?>">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="agregar">
        <a href="agregarD.php" class="boton-agregar">Agregar datos</a>
    </div>
</div>
  
</body>
</html>
