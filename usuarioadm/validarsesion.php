<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica si la sesión está activa
if (!isset($_SESSION['email'])) {
    echo '<script>alert("Por favor, inicia sesión para acceder.");</script>';
    header("Location: ..\index.php");
    exit();
}

$tiempoInactividad = 120; // 2 minutos (en segundos)
if (isset($_SESSION['tiempo']) && (time() - $_SESSION['tiempo'] > $tiempoInactividad)) {
    session_unset();
    session_destroy();
    echo '<script>alert("Tu sesión ha expirado. Por favor, inicia sesión nuevamente.");</script>';
    header("Location: ..\index.php");
    exit();
}
$_SESSION['tiempo'] = time();

include('conexion.php');

$email = $_SESSION['email'];
$stmt = mysqli_prepare($conexion, "SELECT TipoUsuarioID FROM Usuarios WHERE email = ?");
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_bind_result($stmt, $tipoUsuarioID);
    mysqli_stmt_fetch($stmt);

    if ($tipoUsuarioID != 2) {
        echo '<script>alert("No tienes permisos para acceder a esta página.");</script>';
        header("Location: ..\index.php");
        exit();
    }
} else {
    echo '<script>alert("Usuario no encontrado. Por favor, inicia sesión nuevamente.");</script>';
    header("Location: ..\index.php");
    exit();
}

mysqli_stmt_close($stmt);
?>
