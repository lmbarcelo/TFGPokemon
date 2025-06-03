<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "magiktcg");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$q_lower = strtolower($q);

// Redirección por idioma
$idiomas = [
    'japanese' => ['japanese', 'japonés', 'japones'],
    'english' => ['english', 'inglés', 'ingles'],
    'spanish' => ['spanish', 'español', 'espanol'],
    'korean' => ['korean', 'coreano']
];

foreach ($idiomas as $idioma => $variantes) {
    if (in_array($q_lower, $variantes)) {
        header("Location: productos/$idioma.php");
        exit;
    }
}

// Buscar producto exacto 
$stmt = $conexion->prepare("SELECT * FROM productos WHERE LOWER(nombre) LIKE CONCAT('%', ?, '%') LIMIT 1");
$stmt->bind_param("s", $q_lower);
$stmt->execute();
$result = $stmt->get_result();

$no_encontrado = false;
if ($row = $result->fetch_assoc()) {
    $idioma = $row['idioma'];
    $nombre = urlencode($row['nombre']);
    header("Location: productos/{$idioma}.php?producto=$nombre");
    exit;
} else {
    $no_encontrado = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
    <link rel="stylesheet" href="estilos/style.css">
    <style>
        .popup-bg {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top:0; left:0; right:0; bottom:0;
            background: rgba(0,0,0,0.4);
            z-index: 9999;
        }
        .popup-msg {
            background: #fff;
            padding: 32px 24px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.25);
            text-align: center;
            max-width: 350px;
            color: black;
        }
        .popup-msg button {
            margin-top: 18px;
            padding: 8px 18px;
            background: #304F84;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .popup-msg button:hover {
            background: #63999F;
        }
    </style>
</head>
<body>
    <?php if ($no_encontrado): ?>
        <div class="popup-bg" id="popup-bg">
            <div class="popup-msg">
                <h2>No se encontró el producto "<?= htmlspecialchars($q) ?>"</h2>
                <button onclick="window.history.back()">Volver a la página anterior</button>
                <br>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
