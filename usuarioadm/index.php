<?php
include('conexion.php');
include('validarsesion.php');
include('..\vista/mensaje.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\media/locenca.png" type="image/x-icon" />
    <link rel="stylesheet" href="..\estilos/zona.css">
    <link rel="stylesheet" href="..\estilos/zona2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home Admin</title>
</head>
<body>
<header>
    <?php include '..\vista/headeradm.php'; ?>
</header>
<section class="zona1">
<div class="zona2">
<img src="..\media/locenca.png" alt="" class="logoini">
<h1><strong>CERTICENCA.</strong></h1>
<br>
<h5><strong>Obciones Rapidas</strong></h5>
<div class="botons">

            <div class="contenedor1" id="sinco">
                <a href="..\usuarioadm/usuarios.php"><img src="..\mediahea/usuario.png" class="icon"></a>
                <p class="texto">Usuarios</p>

            </div>

            <div class="contenedor" id="seis">
                <a href="..\usuarioadm/certificados.php"><img src="..\mediahea/anadir.png" class="icon"></a>
                <p class="texto">Subir certificado</p>

            </div>
            <div class="contenedor1" id="siete">
                <a href=#"><img src="..\mediahea/nube.png" class="icon"></a>
                <p class="texto">Ayuda</p>

            </div>

        </div>
</div>

</section>

<footer>
    <?php include '..\vista/footer.php'; ?>
</footer>
    
</body>
</html>