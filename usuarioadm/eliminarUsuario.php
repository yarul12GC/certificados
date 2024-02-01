<?php
include('conexion.php');
include('validarsesion.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $usuarioID = $_GET['id'];
    $eliminarUsuario = "DELETE FROM usuarios WHERE UsuarioID = $usuarioID";
    if (mysqli_query($conexion, $eliminarUsuario)) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($conexion);
    }
} else {
    echo "ID de usuario no válido";
}
?>
