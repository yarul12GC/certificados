<?php
include('conexion.php');
include('validarsesion.php');
?>

<?php
include("conexion.php");

// Verificar si se enviaron datos del formulario
if (isset($_POST["update"])) {
    $idusuario = $_POST["UsuarioID"];
    $matricula = isset($_POST["Matricula"]) ? $_POST["Matricula"] : "";
    $nombre = isset($_POST["Nombre"]) ? $_POST["Nombre"] : "";
    $apellidoPaterno = isset($_POST["ApellidoPaterno"]) ? $_POST["ApellidoPaterno"] : "";
    $apellidoMaterno = isset($_POST["ApellidoMaterno"]) ? $_POST["ApellidoMaterno"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
    $tipoEstudioID = isset($_POST["TipoEstudioID"]) ? $_POST["TipoEstudioID"] : "";
    $programaID = isset($_POST["ProgramaID"]) ? $_POST["ProgramaID"] : "";
    $modalidadID = isset($_POST["ModalidadID"]) ? $_POST["ModalidadID"] : "";
    $folioControl = isset($_POST["FolioControl"]) ? $_POST["FolioControl"] : "";
    $estatus = isset($_POST["Estatus"]) ? $_POST["Estatus"] : "";
    $tipoUsuarioID = isset($_POST["TipoUsuarioID"]) ? $_POST["TipoUsuarioID"] : "";

    // Validar que el TipoEstudioID exista en la tabla tiposestudio
    $queryValidacion = "SELECT TipoEstudioID FROM tiposestudio WHERE TipoEstudioID = '$tipoEstudioID'";
    $resultadoValidacion = mysqli_query($conexion, $queryValidacion);

    if (mysqli_num_rows($resultadoValidacion) > 0) {
        // El TipoEstudioID existe, proceder con la actualización
        $queryUpdate = "UPDATE usuarios SET Matricula = '$matricula', Nombre = '$nombre', ApellidoPaterno = '$apellidoPaterno', 
                        ApellidoMaterno = '$apellidoMaterno', email = '$email', contrasena = '$contrasena', 
                        TipoEstudioID = '$tipoEstudioID', ProgramaID = '$programaID', ModalidadID = '$modalidadID', 
                        FolioControl = '$folioControl', Estatus = '$estatus', TipoUsuarioID = '$tipoUsuarioID' 
                        WHERE UsuarioID = '$idusuario'";

        if (mysqli_query($conexion, $queryUpdate)) {
            // Actualización exitosa
            header("Location: usuarios.php");
            exit;
        } else {
            // Error en la actualización
            echo "Error al actualizar el usuario: " . mysqli_error($conexion);
        }
    } else {
        // TipoEstudioID no válido
        echo "TipoEstudioID no válido";
    }
} else {
    // Redirigir si no se envió el formulario
    header("Location: usuarios.php");
    exit;
}
?>
