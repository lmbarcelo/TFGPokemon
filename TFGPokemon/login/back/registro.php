<?php
// CREATE TABLE IF NOT EXISTS usuarios (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nombre VARCHAR(100) NOT NULL,
//     email VARCHAR(100) UNIQUE NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

    // Conexión a la base de datos (credenciales de mi xampp --> root y "")
    $conexion = new mysqli("localhost", "root", "", "magiktcg");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validar que el usuario no exista
    $sql_check = "SELECT id FROM usuarios WHERE email = ?";
    $stmt_check = $conexion->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo "Este correo ya está registrado.";
    } else {
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $password);

        if ($stmt->execute()) {
            echo "Registro exitoso. <a href='../front/login.php'>Iniciar sesión</a>";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conexion->close();
?>
