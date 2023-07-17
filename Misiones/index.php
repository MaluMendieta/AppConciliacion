<!DOCTYPE html>
<html>
<head>
    <title>Esperanza Viva</title>
    <link rel="stylesheet" type="text/css" href="style_login.css">
    <link rel="shortcut icon" href="logo1.jpg" />
</head>
<body>
  <div id="container">
    <div id="login-form">
      <h2>Iniciar sesión</h2>
      <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Iniciar sesión</button>
      </form>
      <p>¿No tienes una cuenta? <a href="#" onclick="toggleForm()">Regístrate aquí</a></p>
    </div>
    <div id="register-form" style="display: none;">
      <h2>Registro</h2>
      <form action="register.php" method="POST">
        <input type="text" name="dni" placeholder="DNI" required>
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="text" name="correo" placeholder="Correo Electrónico" required>
        <input type="text" name="direccion" placeholder="Dirección" required>
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit" id="register">Registrarse</button>
      </form>
      <p>¿Ya tienes una cuenta? <a href="#" onclick="toggleForm()">Inicia sesión aquí</a></p>
    </div>
  </div>

  <div id="notification-container">
    <?php
    if (!empty($error)) {
      echo '<div class="error-message">' . $error . '</div>';
    } elseif (!empty($success)) {
      echo '<div class="success-message">' . $success . '</div>';
    }
    ?>
  </div>
</body>
</html>
