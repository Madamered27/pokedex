<?php
require("datos_conexion.php");

$id = $_POST["idPokemon"];
$nombrePokemon = $_POST["nombrePokemon"];
$tipoPokemon = $_POST["tipoPokemon"];
$descripcion = $_POST["descripcionPokemon"];
$imagen = $_POST["imagenPokemon"];

$conexion = new mysqli($db_host, $db_usuario, $db_pass, $db_nombre);

if ($conexion->connect_errno) {
    echo "No se pudo conectar con el servidor " . $conexion->connect_errno;
    exit();
}

$conexion->set_charset("utf8");

$consulta = "INSERT INTO pokemon (uid, name, url_img, description, idType) VALUES ($id, '$nombrePokemon', '$imagen', '$descripcion', $tipoPokemon)";

if ($conexion->query($consulta)) {
    echo "Se añadio el Pokemon";
}

//por si consulta falla o esta mal escrita
if ($conexion->errno) {
    die($conexion->errno);
}

$conexion->close();