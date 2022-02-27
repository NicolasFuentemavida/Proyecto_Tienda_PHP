<?php
// cambiar a sentencia sql
session_start();
if($_POST){
    if(($_POST['usuario']=="Nicolas")&&($_POST['contrasena']=="Nicolas")){
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="Nicolas";
        header('Location:inicio.php');
    }else{
        $mensaje="error: el usuario o contrasena son incorrectos";
    }


}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:#6F6F6F;">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <br/><br/><br/><br/><br/>
                <div class="card text-left">
                <div class="card-header">
                        <div class="display-4">Hola de nuevo administrador</div></div>
                    <div class="card-body">
                    <div class="card-body">
                        <?php if(isset($mensaje)) {?>
                        <div class="alert alert-danger" role="alert">   
                            <?php echo $mensaje; ?>
                        </div>
                        <?php } ?>
                        <form class="px-4 py-3" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Ingrese Email</label>
                                <input name="usuario" type="text" class="form-control" placeholder="Correo electronico">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contrasena</label>
                                <input name="contrasena" type="password" class="form-control" placeholder="Contrasena">
                            </div>
                            <button type="submit" class="btn btn-outline-success">Ingresar</button>
                        </form>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>