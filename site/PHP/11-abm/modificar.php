<?php 

    $dbname = "bqaqedrgszmaxzzry3xb";
    $host= "bqaqedrgszmaxzzry3xb-mysql.services.clever-cloud.com";
    $user= "ussg4ckvxuovpsxj";
    $password= "DzvwoTvBsMNPFIDxncts";
    $respuesta_estado = "";

    try {

        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password);
        
        $codArt = $_POST["idModif"];
        $marca = $_POST["marcaModif"];
        $modelo = $_POST["modeloModif"];
        $precio = $_POST["precioModif"];
        $fecha = $_POST["fechaModif"];
     

        $sql = "UPDATE Guitarras SET Marca = :marca, Modelo = :modelo, Precio = :precio, Fecha = :fecha WHERE ID = :codArt";
        $stmt = $dbh->prepare($sql);
        $respuesta_estado = $respuesta_estado . "\nPreparación exitosa.";
        $stmt->bindParam(':codArt', $codArt);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':fecha', $fecha);
        $respuesta_estado = $respuesta_estado . "\nBind exitoso.";
        
        $stmt->execute();

        
        if(!isset($_FILES["pdfModif"]))
        {
            $respuesta_estado = $respuesta_estado . "\nNo se inicializó la variable FILES";
        }
        else
        {
            if(empty($_FILES["pdfModif"]["name"]))
            {
                $respuesta_estado = $respuesta_estado . "\nNo se eligieron archivos PDF.";
            }
            else
            {
                $respuesta_estado = $respuesta_estado . "\nBuscando documento asociado al codigo de artículo $codArt";
                $contenidoPDF = file_get_contents($_FILES["pdfModif"]["tmp_name"]);
                $sql = "UPDATE Guitarras SET Archivo = :contenidoPdf WHERE ID = :codArt";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(":contenidoPdf", $contenidoPDF);
                $stmt->bindParam(":codArt", $codArt);
                $stmt->execute();
            }
        }
        $respuesta_estado = $respuesta_estado . "\nEjecución exitosa.";
        $dbh = null;
        $respuesta_estado = $respuesta_estado . "\nSe ha modificado el artículo. Vuelva a cargar los datos para visualizar los cambios.";
        echo $respuesta_estado;
    }
    catch (PDOException $e) {
        $respuesta_estado = $respuesta_estado . "\nERROR: \n" . $e->getMessage();
        echo $respuesta_estado;
    }

?>