<?php 
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location:../index.php");
    }else{
        if($_SESSION['usuario']=="ok")
        $nombreUsuario=$_SESSION["nombreUsuario"];
    }
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body style="background-color:#6F6F6F;">
<?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb"?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url;?>/administrador/seccion/galeria.php">Galeria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url;?>">Ver sitio Web</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
