<?php
  
// Tu código de conexión a la base de datos y verificación de las credenciales
$username = $_POST['username'];
$password = $_POST['password'];
$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$basededatos = "dbproy";
$conector = new mysqli($servidor, $usuario, $password, $basededatos); 
// Obtener la contraseña almacenada en la base de datos
$sql = "SELECT pass FROM usuarios WHERE username = '$username'";
$query = $conector->query($sql);
$result = $query->fetch_assoc();

if ($result) {
  $hashedPassword = $result['pass'];

  // Verificar si la contraseña desencriptada coincide con la contraseña almacenada
  if (password_verify($password, $hashedPassword)) {
    // Las credenciales son válidas
    header("Location: Inicio.php");
    exit();
  } else {
    // Las credenciales son inválidas
    echo '<script>
      alert("Credenciales inválidas. Por favor, intenta nuevamente.");
      setTimeout(function() {
        window.location.href = "index.php";
      }, 500);
    </script>';
  }
} else {
  // El usuario no existe en la base de dato
  echo '<script>
      alert("Usuario no encontrado. Por favor, verifica tus credenciales.");
      setTimeout(function() {
        window.location.href = "index.php";
      }, 500);
    </script>';
}


?>
