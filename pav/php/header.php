<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="margin: 20px;">

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Mantenedor de materiales quirúrgicos</h3>
            </div>
            <div class="col">
                <?php 
                if(session_status() === PHP_SESSION_NONE) session_start();
                echo "Usuario conectado: " . $_SESSION['username']; ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crear.php">Crear</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="actualizar.php" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actualizar</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="busqueda.php?t=act&op=c">Por código</a>
                        <a class="dropdown-item" href="busqueda.php?t=act&op=n">Por nombre</a>
                        <a class="dropdown-item" href="busqueda.php?t=act&op=e">Por empresa</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Consultar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="busqueda.php?t=con&op=t">Todos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="busqueda.php?t=con&op=c">Por código</a>
                        <a class="dropdown-item" href="busqueda.php?t=con&op=n">Por nombre</a>
                        <a class="dropdown-item" href="busqueda.php?t=con&op=e">Por empresa</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Eliminar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="busqueda.php?t=eli&op=c">Por código</a>
                        <a class="dropdown-item" href="busqueda.php?t=eli&op=n">Por nombre</a>
                        <a class="dropdown-item" href="busqueda.php?t=eli&op=e">Por empresa</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="salir.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>