<?php

$conexion = mysqli_connect("localhost", "root", "", "pokedex");


//funcion para mostrar todos los pokemons

$pokemones = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id");
$data = ["pokemones" => $pokemones];

function generateView($content, $data = [])
{
    include_once('index.php');
}


generateView('index.php', $data);





