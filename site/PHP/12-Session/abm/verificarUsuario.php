<?php
    session_start();
    
    // Verificar si el usuario está en sesión
    if (!isset($_SESSION["nombre_usuario"])) {
        // Redireccionar al formulario de inicio de sesión
        header("Location: ../login.html");
        exit;
    }
?>