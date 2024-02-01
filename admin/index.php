<?php
include '../admin/sesion.php';
include '../admin/conexion.php';
include('..\vista/mensaje.php');

$conexion = new mysqli($servidor, $usuario, $password, $db);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
$email = $_SESSION['email'];
$sql = "SELECT Usuarios.Matricula, Usuarios.Nombre, Usuarios.ApellidoPaterno, Usuarios.ApellidoMaterno, Usuarios.email,
        TiposEstudio.NombreTipoEstudio, ProgramasEstudio.NombrePrograma, ModalidadesEstudio.NombreModalidad,
        Usuarios.FolioControl, Usuarios.Estatus
        FROM Usuarios
        INNER JOIN TiposEstudio ON Usuarios.TipoEstudioID = TiposEstudio.TipoEstudioID
        INNER JOIN ProgramasEstudio ON Usuarios.ProgramaID = ProgramasEstudio.ProgramaID
        INNER JOIN ModalidadesEstudio ON Usuarios.ModalidadID = ModalidadesEstudio.ModalidadID
        WHERE Usuarios.email = ?";

$consultaUsuario = $conexion->prepare($sql);
$consultaUsuario->bind_param('s', $email);
$consultaUsuario->execute();
$resultado = $consultaUsuario->get_result();
$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="shortcut icon" href="..\media/locenca.png" type="image/x-icon" />
    <link rel="stylesheet" href="..\estilos/zona.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Iconos -->	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <?php include '..\vista/header.php'; ?>
    </header>
    
    <section class="zona1">
        <h2><strong>Certificados Oficiales</strong></h2><br>

        <table class="tabla1" >
            <th class="encabezadot" colspan="3">Información del Estudiante</th>

            <tr>
                <td style="color: #2b57b1;" ><i class="fa-solid fa-tachograph-digital" ></i> Matrícula:</td>
                <td ><strong>&nbsp;<?php echo $usuario['Matricula']; ?></strong></td>
            </tr>
            <tr>
                <td ><i class="fa-solid fa-user"></i> Nombre: </td>
                <td ><strong>&nbsp;<?php echo $usuario['Nombre']; ?></strong></td>
            </tr>
            <tr>
                <td ><i class="fa-solid fa-user"></i> Apellido Paterno: </td>
                <td ><strong>&nbsp;<?php echo $usuario['ApellidoPaterno']; ?> </strong></td>
            </tr>
            <tr>
                <td ><i class="fa-solid fa-user"></i> Apellido Materno: </td>
                <td ><strong>&nbsp;<?php echo $usuario['ApellidoMaterno']; ?></strong></td>
            </tr>
            <tr>
                <td style="color: #ff2600;" ><i class="fa-solid fa-building-columns" ></i> Tipo de Estudios: </td>
                <td ><strong>&nbsp;<?php echo $usuario['NombreTipoEstudio']; ?></strong></td>
            </tr>
            <tr>
                <td style="color: #f47734;" ><i class="fa-solid fa-graduation-cap" ></i> Programa: </td>
                <td ><strong>&nbsp;<?php echo $usuario['NombrePrograma']; ?></strong></td>
            </tr>
            <tr>
                <td style="color: #790c97;" ><i class="fa-solid fa-school"></i> Modalidad: </td>
                <td ><strong>&nbsp;<?php echo $usuario['NombreModalidad']; ?></strong></td>
            </tr>
            <tr>
                <td style="color: #155625;" ><i class="fa-solid fa-check"></i> Folio Control: </td>
                <td ><strong>&nbsp;<?php echo $usuario['FolioControl']; ?></strong></td>
            </tr>
            <tr>
                <td style="color: #155625;" ><i class="fa-solid fa-check"></i> Estatus: </td>
                <td ><strong>&nbsp;<?php echo $usuario['Estatus']; ?></strong></td>
            </tr>
        </table>
        <br><br>
        <a href="cert.php">
            <button type="button" class="btn btn-success"><i style="color: #ffffff;"><img src="..\mediahea/docs.png" width="15px"></i> Mis certificados</button>
        </a>
        <br><br>
    </section>

    <footer>
        <?php include '..\vista/footer.php'; ?>
    </footer>
</body>
</html>
