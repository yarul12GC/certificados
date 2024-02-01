<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['email'])) {
    header("Location: admin/index.php");
    exit();
}
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);
    $stmt = mysqli_prepare($conexion, "SELECT * FROM Usuarios WHERE email = ? AND contrasena = ?");
    mysqli_stmt_bind_param($stmt, 'ss', $email, $contrasena);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $usuarioID, $matricula, $nombre, $apellidoPaterno, $apellidoMaterno, $email, $contrasena, $tipoEstudioID, $programaID, $modalidadID, $folioControl, $estatus, $tipoUsuarioID);
        mysqli_stmt_fetch($stmt);
        if ($tipoUsuarioID == 1) { //usuario normal
            $_SESSION['email'] = $email;
            header("Location: admin/index.php");
            exit();
        } elseif ($tipoUsuarioID == 2) { // usuario administrador
            $_SESSION['email'] = $email;
            header("Location: usuarioadm/index.php");
            exit();
        } else {
            echo '<script> 
                    alert("Tipo de usuario desconocido. Por favor, contacte al administrador.");
                    window.location = "index.php";
                  </script>';
            exit();
        }
    } else {
        echo '<script> 
                alert("El usuario no existe o las credenciales son incorrectas. Por favor, verifique los datos.");
                window.location = "index.php";
              </script>';
        exit();
    }

    mysqli_stmt_close($stmt);
}
?>
