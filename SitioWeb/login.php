<?php include("template/cabezera.php"); ?>
<div class="container">
    <body style="background-color:#6F6F6F;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card text-left">
                    <div class="card-header">
                        <div class="display-3">Hola de nuevo</div></div>
                    <div class="card-body">
                        <form class="px-4 py-3">
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail1" class="form-label">Ingresa tu Correo</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="Nicolas@Gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword1" class="form-label">Ingresa tu contrasena</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="contrasena">
                            </div>
                            <button type="submit" class="btn btn-outline-success">Ingresar</button>
                            <button type="submit" class="btn btn-outline-dark">olvide mi contrasena</button>
                        </form>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</div>
<?php include("template/pie.php"); ?>