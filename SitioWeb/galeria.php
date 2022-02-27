<?php include("template/cabezera.php"); ?>
<?php include("administrador/config/bd.php");
$sentenciaSQL = $coneccion->prepare("SELECT * FROM imagen");
$sentenciaSQL->execute();
$listarimagen = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">

    <body style="background-color:#6F6F6F;">
        <div class="row">
            <?php foreach ($listarimagen as $imagen) { ?>
                <div class="col-md-4">
                <br>
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="./img/<?php echo $imagen['imagen']; ?>" width="500" height="300">
                            <br />
                            <div class="card text-white bg-success mb-4" style="max-width: 20rem;">
                                <div class="card-header"><?php echo $imagen['nombre']; ?></div>
                                <div class="card-body">
                                    <h5 class="card-title">Descripcion:</h5>
                                    <p class="card-text"><?php echo $imagen['descripcion']; ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php } ?>
            <br>
        </div>
    </body>
</div>

<?php include("template/pie.php"); ?>