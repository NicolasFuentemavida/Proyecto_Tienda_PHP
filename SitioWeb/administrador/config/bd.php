<?php 
//coneccion de base de datos
$host="localhost";
$bd="sitio";
$usuario="root";
$contrasena="";

try{
        $coneccion=new PDO("mysql:host=$host;dbname=$bd", $usuario,$contrasena);
        if($coneccion){echo "";}

} catch( Exception $ex ){
    echo $ex->getMessage();

}
//fin de coneccion de base de datos
?>