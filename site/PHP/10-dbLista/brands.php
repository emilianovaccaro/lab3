<?php

    $dbname = "id20645219_basedepruebas1";
    $host= "localhost";
    $user= "id20645219_emiliano";
    $password= "Emi123!!";
    $respuesta_estado = "";

    try
    {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT * FROM automoviles";
        $stmt = $dbh->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $arrayMarcas = [];
        $objMarcas = new stdClass;

        while($fila = $stmt->fetch())
        {
            $objMarca = new stdClass;
            $objMarca->id = $fila["ID"];
            $objMarca->nombreMarca = $fila["Marca"];
            array_push($arrayMarcas, $objMarca);
        }

        $objMarcas->marcas = $arrayMarcas;
        $objMarcas->largo = count($arrayMarcas);
        $jsonMarcas = json_encode($objMarcas);

        echo $jsonMarcas;
        $dbh = null;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }

?>