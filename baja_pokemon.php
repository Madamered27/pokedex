<?php
require("datos_conexion.php");

$nombrePokemon = $_POST["nombrePokemon"];

$conexion = new mysqli($db_host, $db_usuario, $db_pass , $db_nombre );

if($conexion->connect_errno){
    echo "No se pudo conectar con el servidor " . $conexion->connect_errno;
    exit();
}

$conexion->set_charset("utf8");

$consulta = "DELETE FROM `pokemon` WHERE `name`= '$nombrePokemon'";

$resultado = $conexion->query($consulta);

$afectados = mysqli_affected_rows($conexion);


if($afectados !=0){
    echo "Se elimino el Pokemon";
}
//por si consulta falla o esta mal escrita
if($conexion->errno){
    die($conexion->errno);
}

$conexion->close();