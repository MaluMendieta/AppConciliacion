<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dni = $_POST['dni'];
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $direccion = $_POST['direccion'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!preg_match('/^[0-9]{8}$/', $dni)) {
    echo '<script>
      alert("El DNI debe contener 8 dígitos numéricos.");
      setTimeout(function() {
        window.location.href = "index.php";
      }, 500);
    </script>';
  } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo '<script>
      alert("El correo electrónico es inválido.");
      setTimeout(function() {
        window.location.href = "index.php";
      }, 500);
    </script>';
  } else {
    $servidor = "127.0.0.1";
    $usuario = "root";
    $password = "";
    $basededatos = "dbproy";
    $conector = new mysqli($servidor, $usuario, $password, $basededatos);

    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql_check_username = "SELECT COUNT(*) AS count FROM usuarios WHERE username = '$username'";
    $result_check_username = $conector->query($sql_check_username);
    $row_check_username = $result_check_username->fetch_assoc();

    if ($row_check_username['count'] > 0) {
      echo '<script>
        alert("El usuario ya existe en la base de datos.");
        setTimeout(function() {
          window.location.href = "index.php";
        }, 500);
      </script>';
    } else {
      $sql_check_dni = "SELECT COUNT(*) AS count FROM usuarios WHERE dni = '$dni'";
      $result_check_dni = $conector->query($sql_check_dni);
      $row_check_dni = $result_check_dni->fetch_assoc();

      if ($row_check_dni['count'] > 0) {
        echo '<script>
          alert("El DNI ya está registrado.");
          setTimeout(function() {
            window.location.href = "index.php";
          }, 500);
        </script>';
      } else {
        $sql_check_email = "SELECT COUNT(*) AS count FROM usuarios WHERE correo = '$correo'";
        $result_check_email = $conector->query($sql_check_email);
        $row_check_email = $result_check_email->fetch_assoc();

        if ($row_check_email['count'] > 0) {
          echo '<script>
            alert("El correo electrónico ya está registrado.");
            setTimeout(function() {
              window.location.href = "index.php";
            }, 500);
          </script>';
        } else {
          $sql_insert = "INSERT INTO usuarios (dni, nombre, correo, direccion, username, pass) 
                         VALUES ('$dni', '$nombre', '$correo', '$direccion', '$username', '$hashedPassword')";

          if ($conector->query($sql_insert) === TRUE) {
            echo '<script>
              alert("El usuario ha sido registrado correctamente.");
              setTimeout(function() {
                window.location.href = "index.php";
              }, 500);
            </script>';
          } else {
            echo '<script>
              alert("Error al registrar el usuario: ' . $conector->error . '");
              setTimeout(function() {
                window.location.href = "index.php";
              }, 500);
            </script>';
          }
        }
      }
    }
  }
}
?>

