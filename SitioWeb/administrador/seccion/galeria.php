<?php include("../template/cabezera.php"); ?>
<?php

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

//Validar informacion
//echo $txtImagen."<br/>";
//echo $txtID."<br/>";
//echo $txtNombre."<br/>";
//echo $txtDescripcion."<br/>";
//echo $accion."<br/>";


include("../config/bd.php");
//Funcionalidad de botones
//ocupar para insertar datos a nivel de usuario
switch ($accion) {
    case "Agregar":
        //INSERT INTO `imagen` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, 'nicolas', 'nicolas.jpg', 'nicolas');
        $sentenciaSQL = $coneccion->prepare("INSERT INTO imagen (nombre,imagen,descripcion) 
                                                    VALUES (:nombre,:imagen,:descripcion);");
        //ejecutar sentencia 
        $sentenciaSQL->bindParam(':nombre', $txtNombre);

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->bindParam(':descripcion', $txtDescripcion);
        $sentenciaSQL->execute();
        header("Location:galeria.php");
        break;


    case "Modificar":
        $sentenciaSQL = $coneccion->prepare("UPDATE imagen SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $coneccion->prepare("UPDATE imagen SET descripcion=:descripcion WHERE id=:id");
        $sentenciaSQL->bindParam(':descripcion', $txtDescripcion);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImagen != "") {

            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
            //sentrencia sql se puede reutilizar para la validacionde inicio de secion cambiando usuario=usuario && contrasena igual a contrasena
            $sentenciaSQL = $coneccion->prepare("SELECT * FROM imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $imagen = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($imagen["imagen"]) && ($imagen["imagen"] != "imagen.jpg")) {
                if (file_exists("../../img/" . $imagen["imagen"])) {
                    unlink("../../img/" . $imagen["imagen"]);
                }
            }


            $sentenciaSQL = $coneccion->prepare("UPDATE imagen SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }
        //echo "Modificado";
        header("Location:galeria.php");
        break;
    case "Cancelar":
        header("Location:galeria.php");
        //echo "cancelado";
        break;
    case "Borrar":
        //echo "Borrado";
        $sentenciaSQL = $coneccion->prepare("SELECT * FROM imagen WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $imagen = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($imagen["imagen"]) && ($imagen["imagen"] != "imagen.jpg")) {
            if (file_exists("../../img/" . $imagen["imagen"])) {
                unlink("../../img/" . $imagen["imagen"]);
            }
        }
        $sentenciaSQL = $coneccion->prepare("DELETE  FROM imagen WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("Location:galeria.php");
        break;
    case "seleccionar":
        //echo "Seleccionado";
        $sentenciaSQL = $coneccion->prepare("SELECT * FROM imagen WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $imagen = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtNombre = $imagen['nombre'];
        $txtDescripcion = $imagen['descripcion'];
        $txtImagen = $imagen['imagen'];
}

//Funcionalidad de listar imagen
$sentenciaSQL = $coneccion->prepare("SELECT * FROM imagen");
$sentenciaSQL->execute();
$listarimagen = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


//ocupar para insertar datos a nivel de usuario
//Funcionalidad de botones
?>
<br /><br />
<div class="row">
    <div class="col-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-left">
                        <div class="card-header">Inicio de secion</div>
                        <div class="card-body">
                            <form class="px-4 py-3" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="txtID">ID:</label>
                                    <input required readonly type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="txtNombre">Nombre:</label>
                                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="txtImagen">Imagen:</label>
                                    <br />
                                    <input required type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre">
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="txtDescripcion">Descripcion:</label>
                                    <input type="text" value="<?php echo $txtDescripcion; ?>" class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion">
                                </div>
                                <br />
                                <div class="btn-group" role="group" aria-label="">
                                    <button type="submit" value="Agregar" name="accion" <?php echo($accion=="seleccionar")?"disabled":"";?> class="btn btn-success">Agregar</button>
                                    <button type="submit" value="Modificar" name="accion" <?php echo($accion!="seleccionar")?"disabled":"";?> class="btn btn-warning">Modificar</button>
                                    <button type="submit" value="Cancelar" name="accion" <?php echo($accion!="seleccionar")?"disabled":"";?> class="btn btn-info">Canelar</button>
                                </div>
                                <br />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listarimagen as $imagen) { ?>
                    <tr>
                        <th scope="row"><?php echo $imagen['id']; ?></th>
                        <td><?php echo $imagen['nombre']; ?></td>
                        <td>
                            <img src="../../img/<?php echo $imagen['imagen']; ?>" width="50" height="50" h alt="">

                        </td>
                        <td><?php echo $imagen['descripcion']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $imagen['id']; ?>">
                                <input type="submit" name="accion" value="seleccionar" class="btn btn-primary" />
                                <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                <?php }   ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("../template/pie.php"); ?>