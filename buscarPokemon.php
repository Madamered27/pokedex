<?php
include_once("datos_conexion.php");

//datos traidos del form del pokemon a buscar
$dato = $_POST["dato"];

$consultarPokemon = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE p.uid = '$dato' OR p.name = '$dato' OR t.description = '$dato'");

foreach ($consultarPokemon as $pokemon){
    echo $pokemon["uid"];
    echo "<br>";
}

$conexion->close();