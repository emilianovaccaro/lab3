<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables tipo Objeto</title>
    <style>
        .resaltado
        {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Variables tipo objeto en PHP</h2>
    <h2 class="resaltado">$objRenglonPedido</h2>
    <?php 
        $objRenglonPedido = new stdClass;
        $objRenglonPedido->nombre = "Emiliano";
        $objRenglonPedido->apellido = "Vaccaro";
        $objRenglonPedido->nacimiento = "06/06/1996";

        $objRenglonPedido2 = new stdClass;
        $objRenglonPedido2->nombre = "Guillermo";
        $objRenglonPedido2->apellido = "Vaccaro";
        $objRenglonPedido2->nacimiento = "20/09/1963";
        $renglonesPedido = [];
        array_push($renglonesPedido, $objRenglonPedido);
        array_push($renglonesPedido, $objRenglonPedido2);

        echo "Nombre: " . $objRenglonPedido->nombre . "<br>";
        echo "Apellido: " . $objRenglonPedido->apellido . "<br>";
        echo "Nacimiento: " . $objRenglonPedido->nacimiento . "<br>";
        echo "Cantidad: " . count($renglonesPedido);

        echo "<h2>Tipo de <span class='resaltado'>\$objRenglonPedido</span>: " . gettype($objRenglonPedido) . "</h2>";

        echo "<h2>Arreglo de pedidos: </h2>";
        echo "<h2><span class='resaltado'>\$renglonesPedido</span></h2>";
        echo "<h2>Tabla <span class='resaltado'>\$renglonesPedido</span>. Recorrer y tabular en html el arreglo de renglones</h2>";
        echo "<table>";
        foreach($renglonesPedido as $objRenglon)
        {
            echo "<tr>";
            echo "<td>" . $objRenglon->nombre . "</td>";
            echo "<td>" . $objRenglon->apellido . "</td>";
            echo "<td>" . $objRenglon->nacimiento . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>Cantidad de renglones: ". count($renglonesPedido) ."</h2>";
        echo "<h2>Producción de un objeto <span class='resaltado'>\$objRenglonesPedido</span> con dos atributos: (array) renglonesPedido y cantidadRenglones</h2>";

        $objRenglonesPedido = new stdClass;
        $objRenglonesPedido->renglonesPedido = $renglonesPedido;
        $objRenglonesPedido->cantidadRenglones = count($renglonesPedido);

        echo "<h2>Producción de un JSON jsonRenglones</h2>";
        $jsonRenglones = json_encode($objRenglonesPedido);
        echo $jsonRenglones;

        echo "<hr/>";

        $myVar = "../index.html";
        echo "<a href=$myVar>Volver</a>"
    ?>

</body>
</html>