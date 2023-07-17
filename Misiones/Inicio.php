<!DOCTYPE html>
<html>
<head>
    <title>Página de Inicio - Centro de Conciliación "Esperanza Viva"</title>
    <link rel="shortcut icon" href="logo1.jpg" />
    <style>
        body {
            background-color: #f2f2f2;
            background-image: url('fondo1.jpg');
        }
        
        .container {
            width: 500px;
            margin: 0 auto;
            margin-top: 200px;
            text-align: center;
        }
        
        .container img {
            width: 150px;
            height: 150px;
        }
        h1 {
            font-size: 32px;
            text-align: center; /* Alineación centrada del texto */
            font-family: 'VT323', monospace;
            -webkit-text-stroke: 1px #F4D06F; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            animation: glowing 1s infinite alternate;
            }

            @keyframes glowing {
            0% {
                color: transparent;
                -webkit-text-stroke: 1px #F4D06F;
            }
            50% {
                color: #F4D06F; /* Color celeste */
                -webkit-text-stroke: none;
            }
            100% {
                color: transparent;
                -webkit-text-stroke: 1px #F4D06F;
            }
         }
    </style>
</head>
<body>
    <div class="container">
        <img src="equipo.png" alt="Logo del Centro de Conciliación">
        <h1>Bienvenido al sistema del Centro de Conciliación "Esperanza Viva"</h1>
    </div>
</body>
</html>
<?php
include 'sidebar.php';
?>