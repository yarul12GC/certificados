<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\estilos/header.css">
</head>
<body>
    <header>
        <div>

            <nav class="navegacion">
                <ul class="menu">
                    <li><a href=""> <img src="..\mediahea/lista.png" alt="" width="15px"> Datos </a>
                        <ul class="submenu">
                            <li><a href="..\admin/index.php"> <img src="..\mediahea/usuario.png" width="15px">datos del alumno</a></li>
                        </ul>
                    </li>


                    <li><a href=""> <img src="..\mediahea/docs.png" alt="" width="15px"> Certificación</a>
                        <ul class="submenu">
                            <li><a href="..\admin/cert.php"> <img src="..\mediahea/anadir.png" width="15px">certificados</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
        <nav class="navegacion">
            <ul>

                <li><a href="..\admin/index.php"> <img src="..\media/locenca.png" width="45px"></a></li>
            </ul>
        </nav>
        </div>

        <nav class="navegacion">

            <div>
                <ul class="menu2">
                    <li><a href="..\ayuda/ayuda.php"> <img src="..\mediahea/nube.png" alt="" width="15px"> Ayuda</a></li>
                    <li><a href="..\/salir.php"> <img src="..\mediahea/cerrar.png" alt="" width="15px"> Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>

<script>
    function toggleMenu() {
        var menu = document.querySelector('navegacion');
        menu.classList.toggle('show');
    }
</script>