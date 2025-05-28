<?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Sin contraseña por defecto en XAMPP
    $dbname = "magiktcg";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $comentario = $_POST['comentario'];

    // Preparar y ejecutar SQL
    $sql = "INSERT INTO contacto (nombre, email, comentario) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $comentario);

    if ($stmt->execute()) {
        echo "¡Gracias por contactarnos!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    // COnsulta SQL Para crear la base de datos y la tabla contacto
    // CREATE DATABASE magiktcg;
    // USE magiktcg;
    
    // CREATE TABLE contacto (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     nombre VARCHAR(100) NOT NULL,
    //     email VARCHAR(100) NOT NULL,
    //     comentario TEXT NOT NULL,
    //     fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    // );
?>

