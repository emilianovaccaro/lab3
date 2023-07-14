<?php
    include("./verificarUsuario.php");
    
    $dbname = "id20645219_basedepruebas1";
    $host = "localhost";
    $user = "id20645219_emiliano";
    $password = "Emi123!!";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $movimientoDeLaRequest = "";
        $movimientoDeLaRequest = $movimientoDeLaRequest . "\nSe modificara un registro";

        $id = $_POST["id"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $precio = $_POST["precio"];
        $anio = $_POST["anio"];

        $movimientoDeLaRequest = $movimientoDeLaRequest . "\nEncontrado, registro a modificar: $id" ;


        $id_usuario = $_SESSION["id_usuario"];
        
        // Verificar si se ha subido una nueva imagen
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] !== '') {
            $movimientoDeLaRequest = $movimientoDeLaRequest . "\nFile nuevo seleccionado";
            $pdfData = file_get_contents($_FILES["imagen"]["tmp_name"]);
            $sql = "UPDATE automoviles SET Marca = :marca, Modelo = :modelo, Precio = :precio, Anio = :anio, Imagenes = :pdfData WHERE ID = :id AND id_usuario = :id_usuario";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':pdfData', $pdfData, PDO::PARAM_LOB);
        } else {
            $movimientoDeLaRequest = $movimientoDeLaRequest . "\nFile nuevo NO seleccionado";
            $sql = "UPDATE automoviles SET Marca = :marca, Modelo = :modelo, Precio = :precio, Anio = :anio WHERE ID = :id AND id_usuario = :id_usuario";
            $stmt = $dbh->prepare($sql);
        }
        
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        
        $movimientoDeLaRequest = $movimientoDeLaRequest . "\nSe modifico correctamente el registro";


        echo $movimientoDeLaRequest;
        $dbh = null;
    } catch (PDOException $e) {
        $movimientoDeLaRequest = $movimientoDeLaRequest . "\nERROR: \n" . $e->getMessage();
        $movimientoDeLaRequest = $movimientoDeLaRequest . "\nNO SE LOGRO MODIFICAR EL REGISTRO";
        echo $movimientoDeLaRequest;

    }

?>
