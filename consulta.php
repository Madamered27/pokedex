<?php
include_once("datos_conexion.php");

//funcion para mostrar todos los pokemons

$pokemones = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id");
$data = ["pokemones" => $pokemones];