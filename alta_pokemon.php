<?php
require_once("permisos.php");
include_once("datos_conexion.php");

//datos traidos del form del pokemon nuevo a añadir
$id = $_POST["idPokemon"];
$nombrePokemon = $_POST["nombrePokemon"];
$tipoPokemon = $_POST["tipoPokemon"];
$descripcion = $_POST["descripcionPokemon"];
$imagen = $_FILES["imagenPokemon"];


//variable de tipo string que arma la url de la imagen
$urlImagenNueva = "img/" . $_FILES["imagenPokemon"]["name"];

//función para guardar la imagen del la subida temporal a la carpeta img
function copiarArchivoSubidoDeCarpetaTemporalADestino($destination)
{
    return move_uploaded_file($_FILES["imagenPokemon"]["tmp_name"], $destination);
}

copiarArchivoSubidoDeCarpetaTemporalADestino("./img/" . $_FILES["imagenPokemon"]["name"]);


mysqli_query($conexion, "INSERT INTO pokemon (uid, name, url_img, description, idType) VALUES ('$id', '$nombrePokemon', '$urlImagenNueva', '$descripcion', $tipoPokemon)");

$consultarPokemonNuevo = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE uid = '$id'");

$pokemonNuevo = mysqli_fetch_array($consultarPokemonNuevo);

$mensaje = "Se ha creado un nuevo pokemon: " . $pokemonNuevo["name"] . ", con id: " . $pokemonNuevo["uid"];

$conexion->close();


header("Location: index.php?mensaje=$mensaje");