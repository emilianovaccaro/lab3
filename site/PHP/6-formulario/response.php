<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response</title>
</head>
<body>
    <?php 
        echo "Valores pasados: <br/>";
        echo "<br/>";
        echo "Nombre: " . $_GET["nombre"] . "<br/>";
        echo "<br/>";
        echo "Apellido: " . $_GET["apellido"] . "<br/>";
        echo "<br/>";
        $myVar = "./index.php";
        echo "<a href=$myVar><button>Cerrar</button></a>"
    ?>
    
</body>
</html>