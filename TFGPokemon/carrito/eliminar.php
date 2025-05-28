<?php
session_start();
$id = $_POST['id'];

foreach ($_SESSION['carrito'] as $index => $producto) {
    if ($producto['id'] == $id) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar
        break;
    }
}
header("Location: procesar.php");
