<?php
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor,$usuario,$password,$basededatos);
$query = "SELECT * FROM conciliador";
$result = mysqli_query($conector, $query);
$conciliadores = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <h2>INFORMACION DE LOS CONCILIADORES</h2>
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
        <?php foreach ($conciliadores as $conciliador): ?>
            <tr>
                <td><?php echo $conciliador['Id_Conciliador']; ?></td>
                <td><?php echo $conciliador['Nombre']; ?></td>
                <td><?php echo $conciliador['Apellido']; ?></td>
                <td><?php echo $conciliador['Celular']; ?></td>
                <td><?php echo $conciliador['Correo']; ?></td>
                <td><?php echo $conciliador['DNI']; ?></td>
                <td><?php echo $conciliador['Dirección']; ?></td>
                <td><?php echo $conciliador['n_reg_general']; ?></td>
                <td><?php echo $conciliador['n_reg_familia']; ?></td>
                <td>
                    <div class="actions">
                        <a class="editar" href="editarC.php?id=<?php echo $conciliador['Id_Conciliador']; ?>">Editar</a>
                        <a class="eliminar" href="eliminarC.php?id=<?php echo $conciliador['Id_Conciliador']; ?>">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="agregar">
        <a href="agregarC.php" class="boton-agregar">Agregar datos</a>
    </div>
</div>
  
</body>
</html>
