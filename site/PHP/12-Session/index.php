<?php
    include("./verificarUsuario.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal protegida</title>
</head>
<body>
    <h1>Bienvenido a la página principal</h1>
    <p>Hola, <?php echo $_SESSION["nombre_usuario"]; ?>. Has iniciado sesión correctamente.</p>
    <a href="./logout.php"><button>Cerrar sesión</button></a>
    <a href="./abm/index.php"><button>Ir a la aplicación</button></a>
</body>
</html>