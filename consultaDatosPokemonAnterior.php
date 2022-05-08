<?php

include_once("datos_conexion.php");

$pokemonId = $_GET["pokemonId"];
$pokemon = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE uid = '$pokemonId'");
$pokemonAnterior = mysqli_fetch_array($pokemon);