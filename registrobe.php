<?php
include('validarsesion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = isset($_POST["Matricula"]) ? trim($_POST["Matricula"]) : "";
    $nombre = isset($_POST["Nombre"]) ? trim($_POST["Nombre"]) : "";
    $apellidoPaterno = isset($_POST["ApellidoPaterno"]) ? trim($_POST["ApellidoPaterno"]) : "";
    $apellidoMaterno = isset($_POST["ApellidoMaterno"]) ? trim($_POST["ApellidoMaterno"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
    $tipoEstudioID = isset($_POST["TipoEstudioID"]) ? intval($_POST["TipoEstudioID"]) : 0;
    $programaID = isset($_POST["ProgramaID"]) ? intval($_POST["ProgramaID"]) : 0;
    $modalidadID = isset($_POST["ModalidadID"]) ? intval($_POST["ModalidadID"]) : 0;
    $folioControl = isset($_POST["FolioControl"]) ? trim($_POST["FolioControl"]) : "";
    $estatus = isset($_POST["Estatus"]) ? trim($_POST["Estatus"]) : "";
    $tipoUsuarioID = isset($_POST["TipoUsuarioID"]) ? intval($_POST["TipoUsuarioID"]) : 0;

    if (empty($matricula) || empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($email) || empty($contrasena) || empty($tipoEstudioID) || empty($programaID) || empty($modalidadID) || empty($folioControl) || empty($estatus) || empty($tipoUsuarioID)) {
        echo '<p class="text-danger">Por favor, completa todos los campos.</p>';
    } else {
        $dsn = "mysql:host=localhost;dbname=certificados";
        $usuarioDB = "root";
        $contrasenaDB = "";

        try {
            $conexion = new PDO($dsn, $usuarioDB, $contrasenaDB);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consultaExistencia = $conexion->prepare("SELECT email FROM Usuarios WHERE email = :email");
            $consultaExistencia->bindParam(':email', $email);
            $consultaExistencia->execute();

            if ($consultaExistencia->rowCount() > 0) {
                echo '<p class="text-danger">El usuario ya existe. Inténtalo con otro correo.</p>';
            } else {
                // Hash de la contraseña
                $hashedPassword = hash('sha512', $contrasena);

                $consultaInsertar = $conexion->prepare("INSERT INTO Usuarios (Matricula, Nombre, ApellidoPaterno, ApellidoMaterno, email, contrasena, TipoEstudioID, ProgramaID, ModalidadID, FolioControl, Estatus, TipoUsuarioID) VALUES (:Matricula, :Nombre, :ApellidoPaterno, :ApellidoMaterno, :email, :contrasena, :TipoEstudioID, :ProgramaID, :ModalidadID, :FolioControl, :Estatus, :TipoUsuarioID)");

                $consultaInsertar->bindParam(':Matricula', $matricula);
                $consultaInsertar->bindParam(':Nombre', $nombre);
                $consultaInsertar->bindParam(':ApellidoPaterno', $apellidoPaterno);
                $consultaInsertar->bindParam(':ApellidoMaterno', $apellidoMaterno);
                $consultaInsertar->bindParam(':email', $email);
                $consultaInsertar->bindParam(':contrasena', $hashedPassword);
                $consultaInsertar->bindParam(':TipoEstudioID', $tipoEstudioID);
                $consultaInsertar->bindParam(':ProgramaID', $programaID);
                $consultaInsertar->bindParam(':ModalidadID', $modalidadID);
                $consultaInsertar->bindParam(':FolioControl', $folioControl);
                $consultaInsertar->bindParam(':Estatus', $estatus);
                $consultaInsertar->bindParam(':TipoUsuarioID', $tipoUsuarioID);

                $consultaInsertar->execute();

                echo '<script>alert("Usuario registrado exitosamente");</script>';
                header("Location: ./usuarioadm/usuarios.php");
                exit();
            }
            $conexion = null;
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        }
    }
}
?>
