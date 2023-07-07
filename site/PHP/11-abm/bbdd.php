<?php 

    $dbname = "bqaqedrgszmaxzzry3xb";
    $host= "bqaqedrgszmaxzzry3xb-mysql.services.clever-cloud.com";
    $user= "ussg4ckvxuovpsxj";
    $password= "DzvwoTvBsMNPFIDxncts";
    $respuesta_estado = "";

    try 
    { 
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password); /*Database Handle*/ 
        $respuesta_estado = $respuesta_estado . "\nConexión exitosa"; 

        $orden = $_GET["orden"];
        $filtroId = $_GET["id"];
        $filtroMarca = $_GET["marca"];
        $filtroModelo = $_GET["modelo"];
        $filtroPrecio = $_GET["precio"];
        $filtroFecha = $_GET["fecha"];
        
        $sql = "SELECT * FROM Guitarras WHERE ID LIKE CONCAT('%',:filtroId,'%') AND Marca LIKE CONCAT('%',:filtroMarca ,'%') AND Modelo LIKE CONCAT('%',:filtroModelo ,'%') AND Precio LIKE CONCAT('%',:filtroPrecio ,'%') AND Fecha LIKE CONCAT('%',:filtroFecha ,'%') ORDER BY $orden";
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':filtroId', $filtroId);
        $stmt->bindParam(':filtroMarca', $filtroMarca);
        $stmt->bindParam(':filtroModelo', $filtroModelo);
        $stmt->bindParam(':filtroPrecio', $filtroPrecio);
        $stmt->bindParam(':filtroFecha', $filtroFecha);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $ArrayGuitarras = [];
        $objGuitarras = new stdClass;

        while($fila = $stmt->fetch())
        {
            $objGuitarra = new stdClass;
            $objGuitarra->id = $fila["ID"];
            $objGuitarra->marca = $fila["Marca"];
            $objGuitarra->modelo = $fila["Modelo"];
            $objGuitarra->precio = $fila["Precio"];
            $objGuitarra->año = $fila["Fecha"];
            array_push($ArrayGuitarras, $objGuitarra);
        }

        $objGuitarras->guitarras = $ArrayGuitarras;
        $objGuitarras->largo = count($ArrayGuitarras);
        $jsonGuitarras = json_encode($objGuitarras);
        echo $jsonGuitarras;
        $dbh = null;

    } catch (PDOException $e) 
    { 
        // $respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
        // echo $respuesta_estado;
        echo $e->getMessage();
     }

?>