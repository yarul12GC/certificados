<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    echo '<script>alert("Por favor, inicia sesión para acceder.");</script>';
    header("Location: ..\index.php");
    exit();
}
?>