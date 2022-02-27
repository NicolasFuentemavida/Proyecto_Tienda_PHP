<?php include("template/cabezera.php"); ?>
<?php



$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtApellido = (isset($_POST['txtApellido'])) ? $_POST['txtApellido'] : "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";
$txtContrasena = (isset($_POST['txtContrasena'])) ? $_POST['txtContrasena'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("administrador/config/bd.php");

//coneccion a bd

//agregar usuario
switch ($accion) {
    case "Agregar":
        //INSERT INTO `imagen` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, 'nicolas', 'nicolas.jpg', 'nicolas');
        $sentenciaSQL = $coneccion->prepare("INSERT INTO usuario (nombre,apellido,correo,contrasena)VALUES(:nombre,:apellido,:correo,:contrasena);");
        //ejecutar sentencia 
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':apellido', $txtApellido);
        $sentenciaSQL->bindParam(':correo', $txtCorreo);
        $sentenciaSQL->bindParam(':contrasena', $txtContrasena);
        $sentenciaSQL->execute();
        header("Location:galeria.php");
        break;
}

?>
<div class="container">

    <body style="background-color:#6F6F6F;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card text-left">
                    <div class="card-header">
                        <div class="display-3">Hola integrante nuevo</div>
                    </div>
                    <div class="card-body">
                        <form class="px-4 py-3" method="POST" >
                            <div class="mb-3">
                                <label class="form-label">Ingresa tu nombre</label>
                                <input required type="text" id="txtNombre" value="<?php echo $txtNombre; ?>" name="txtNombre" class="form-control" placeholder="Nicolas">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingresa tus apelidos</label>
                                <input required type="text" value="<?php echo $txtApellido;?>" id="txtApellido" name="txtApellido" class="form-control" placeholder="Nicolas Fuentemavida">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingresa tu Correo</label>
                                <input required type="email" value="<?php echo $txtCorreo; ?>" id="txtCorreo" name="txtCorreo" class="form-control" placeholder="Nicolas@Nicolas.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingresa tu contrasena</label>
                                <input required type="password" value="<?php echo $txtContrasena; ?>" id="txtContrasena" class="form-control" name="txtContrasena" placeholder="contrasena">
                            </div>
                            <button type="submit" value="Agregar" name="accion" class="btn btn-outline-success">Registrar</button>
                        </form>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</div>
<?php include("template/pie.php"); ?>