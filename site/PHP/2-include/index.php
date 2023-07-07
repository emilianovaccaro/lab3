<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
    <style>
        table, tr, td
        {
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <h2>En este ejemplo se utiliza la función include() que ubica código php definido en el archivo codigo.inc</h2>
    <h2>Antes de insertar el include() las variables declaradas en el mismo no existen</h2>
    <?php
        foreach($arrayAsociativo as $persona)
        {
            echo "<tr>";
            echo "<td>" . $persona["Nombre"] . "</td>";
            echo "<td>" . $persona["Apellido"] . "</td>";
            echo "<td>" . $persona["Nacimiento"] . "</td>";
            echo "</tr>";
        }

        include "codigo.inc";
        echo "<h2>Longitud del array: " . count($arrayAsociativo) . "<h2>";
        echo "<h2>Aquí ya se ejecutó la función include(). Cuando se usa include() ocurre que si el archivo '.inc' no existe, se visualiza un warning y el script sigue ejecutándose hasta el final</h2>";
        echo "<h2>Las dos variables de tipo array asociativo en el inc son: </h2>";

        echo "<table>";
        foreach($arrayAsociativo as $persona)
        {
            echo "<tr>";
            echo "<td>" . $persona["Nombre"] . "</td>";
            echo "<td>" . $persona["Apellido"] . "</td>";
            echo "<td>" . $persona["Nacimiento"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>La longitud de los arreglos es: " . count($arrayAsociativo[0]) . "<h2>";
        $myVar = "../index.html";
        echo "<a href=$myVar>Volver</a>"
    ?>
</body>
</html>