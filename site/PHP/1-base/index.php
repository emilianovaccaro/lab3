<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" content-type="text/html">
    <title>Document</title>
    <style>
        .config
        {
            color: blue;
            font-weight: bold;
        }

        
    </style>
</head>
<body>
    <h2>Todo lo escrito fuera de las marcas de php es entregado en la respuesta http sin pasar por el procesador php</h2>
    <hr>
    <?php
        $index = "../index.html";
        $variable1 = 100;
        $variable2 = true;
        $variable3 = false;
        $arrayPalabras = ["Hola", "Hello"];
        $arrayPalabras2 = ["Computdora", "Computer", "Computer", "Ordinateur"];
        $arrayPalabras3 = ["Música", "Music", "Musica", "Musique"];
        define("constante", "Emiliano");

        echo "<h2>Texto <span class='config'>entregado por el procesador php</span> usando la sentencia echo</h2>";
        echo "<hr>";
        echo "<h2>Sin usar concatenador <span class='config'>\$miVariable</span>: $variable1</h2>";
        echo "<h2>Usando concatenador <span class='config'>\$miVariable</span>: " . $variable1 . "</h2>" ;
        echo "<hr>";
        echo "<h2>Variable tipo lógica o booleana (verdadero) <span class='config'>\$variable2</span>: $variable2</h2>";
        echo "<h2>Variable tipo lógica o booleana (falso) <span class='config'>\$variable2</span>: $variable3</h2>";
        echo "<hr>";
        echo "<h2><span class='config'>constante: </span>: " . constante . "</h2>";
        echo "<h2>Tipo de <span class='config'>constante: </span>: " . gettype(constante) . "</h2>";
        echo "<hr>";
        echo "<h2>Arreglos:</h2>";
        echo "<h2><span class='config'>arrayPalabras</span>: $arrayPalabras[0] </h2>";
        echo "<h2><span class='config'>arrayPalabras</span>: $arrayPalabras[1] </h2>";
        echo "<h2>Tipo de dato de <span class='config'>arrayPalabras</span>: " . gettype($arrayPalabras) . "</h2>";
        echo "<h2>Se agregan por programa dos palabras: </h2>";
        array_push($arrayPalabras, "Ciao");
        array_push($arrayPalabras, "Bonjour");
        echo "<ul>";
        foreach($arrayPalabras as $palabra)
        {
            echo "<li><h3>$palabra</h3></li>";
        }
        echo "</ul>";
        echo "<hr>";
        echo "<h2>Arreglo de dos dimensiones (diccionario): </h2>";
        
        $diccionario = [$arrayPalabras, $arrayPalabras2];
        array_push($diccionario, $arrayPalabras3);

        echo "<h2>Tipo de <span class='config'>\$diccionario</span>: " . gettype($diccionario) . "</h2>";
        echo "<table><thead><td>Español</td><td>Inglés</td><td>Italiano</td><td>Francés</td>";
        foreach($diccionario as $array)
        {
            echo "<tr>";
            foreach($array as $palabra)
            {
                echo "<td>$palabra</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<h2>También así se puede expresar el valor de <span class='config'>\$diccionario[0][2]</span>: ". $diccionario[0][2] ."</h2>"; 
        echo "<h2>También así se puede expresar el valor de <span class='config'>\$diccionario[2][0]</span>: ". $diccionario[2][0] ."</h2>"; 
        echo "<h2>Cantidad de elementos del diccionario: " . count($diccionario) . "</h2>";
        echo "<hr>";
        echo "<h2>Variables tipo arreglo asociativo: </h2>";

        $arrayAsociativo = ["DNI" => "39432429", "Nombre" => "Emiliano", "Apellido" => "Vaccaro", "Fecha Nacimiento" => "06/06/1996", "Legajo" => "15-27760"];
        echo "<h2>DNI: " . $arrayAsociativo["DNI"] . "</h2>"; 
        echo "<h2>Nombre: " . $arrayAsociativo["Nombre"] . "</h2>"; 
        echo "<h2>Apellido: " . $arrayAsociativo["Apellido"] . "</h2>"; 
        echo "<h2>Fecha de Nacimiento: " . $arrayAsociativo["Fecha Nacimiento"] . "</h2>"; 
        echo "<h2>Legajo: " . $arrayAsociativo["Legajo"] . "</h2>"; 
        echo "<h2>Cantidad de elementos ". count($arrayAsociativo) ."</h2>";
        echo "<h2>Tipo de dato: ". gettype($arrayAsociativo) ."</h2>";
        echo "<hr>";

        $x = 183;
        $y = 12;

        echo "<h2>Expresiones aritméticas: </h2>";
        echo "<h2>La variable \$x tiene el siguiente valor: $x </h2>";
        echo "<h2>La variable \$y tiene el siguiente valor: $y </h2>";
        echo "<h2>La variable \$x es del tipo: " .gettype($x). "</h2>";
        echo "<h2>La variable \$y es del tipo: " .gettype($y). "</h2>";
        echo "<h2>Así se imprime una expresión aritmética de tipo suma: (\$x + \$y) = " . ($x+$y) . "</h2>";
        echo "<h2>Así se imprime una expresión aritmética de tipo resta: (\$x - \$y) = " . ($x-$y) . "</h2>";
        echo "<h2>Así se imprime una expresión aritmética de tipo división: (\$x / \$y) = " . ($x/$y) . "</h2>";

        echo "<br/>";
        echo "<a href=$index>Volver</a>";
      
    ?>
</body>
</html>