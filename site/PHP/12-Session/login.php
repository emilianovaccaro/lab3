<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbname = "id20645219_basedepruebas1";
    $host = "localhost";
    $user = "id20645219_emiliano";
    $password = "Emi123!!";

    try {
        // Validar y filtrar los valores de $_POST
        $nombreUsuario = filter_var($_POST["nombre_usuario"], FILTER_SANITIZE_STRING);
        $contrasenia = filter_var($_POST["contrasenia"], FILTER_SANITIZE_STRING);

        // Establecer la conexión a la base de datos
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $indexVar = "./index.php";
        // Preparar y ejecutar la consulta
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombreUsuario);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        

        // Verificar las credenciales y establecer la sesión
        if ($usuario && password_verify($contrasenia, $usuario["contrasenia"])) {
            $_SESSION["nombre_usuario"] = $usuario["nombre_usuario"];
            $_SESSION["id_usuario"] = $usuario["id"];
            header("Location: index.php"); // Redirigir al inicio después del inicio de sesión exitoso
            exit;
        } else {
            $error = "Credenciales inválidas. Por favor, verifique su nombre de usuario y contraseña.";
            echo $error . "     <a href=$indexVar><button>Volver a Login</button></a>";
            
        }


        $dbh = null;
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
        echo $error;
    }
}
?>
