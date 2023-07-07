<?php
    // sleep(1);
    // $marcas = ["Fender", "Gibson", "PRS", "Martin", "Ibanez", "Collings", "Guild", "Yacopi"];
    // $jsonMarcas = json_encode($marcas);
    // echo $jsonMarcas;

    $dbname = "bqaqedrgszmaxzzry3xb";
    $host= "bqaqedrgszmaxzzry3xb-mysql.services.clever-cloud.com";
    $user= "ussg4ckvxuovpsxj";
    $password= "DzvwoTvBsMNPFIDxncts";
    $respuesta_estado = "";

    try
    {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT * FROM Marcas";
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