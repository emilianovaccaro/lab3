<?php 

    $dbname = "id20645219_basedepruebas1";
    $host= "localhost";
    $user= "id20645219_emiliano";
    $password= "Emi123!!";

    try 
    { 
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password); 

        $orden = $_GET["orden"];
        $FId = $_GET["id"];
        $FMarca = $_GET["marca"];
        $FModelo = $_GET["modelo"];
        $FPrecio = $_GET["precio"];
        $FFecha = $_GET["fecha"];
        
        $sql = "SELECT * FROM automoviles WHERE ID LIKE CONCAT('%',:FId,'%') AND Marca LIKE CONCAT('%',:FMarca ,'%') AND Modelo LIKE CONCAT('%',:FModelo ,'%') AND Precio LIKE CONCAT('%',:FPrecio ,'%') AND Fecha LIKE CONCAT('%',:FFecha ,'%') ORDER BY $orden";
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':FId', $FId);
        $stmt->bindParam(':FMarca', $FMarca);
        $stmt->bindParam(':FModelo', $FModelo);
        $stmt->bindParam(':FPrecio', $FPrecio);
        $stmt->bindParam(':FFecha', $FFecha);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $ArrayAutomoviles = [];
        $objAutomoviles = new stdClass;

        while($fila = $stmt->fetch())
        {
            $objAuto = new stdClass;
            $objAuto->id = $fila["ID"];
            $objAuto->marca = $fila["Marca"];
            $objAuto->modelo = $fila["Modelo"];
            $objAuto->precio = $fila["Precio"];
            $objAuto->año = $fila["fecha"];
            array_push($ArrayAutomoviles, $objAuto);
        }

        $dbh = null;
        $objAutomoviles->automoviles = $ArrayAutomoviles;
        $objAutomoviles->largo = count($ArrayAutomoviles);
        $jsonAutomoviles = json_encode($objAutomoviles);
        echo $jsonAutomoviles;

    } catch (PDOException $e) 
    { 
        echo $e->getMessage();
     }

?>