<?php

$conexion = mysqli_connect("localhost", "root", "", "pokedex");

$pokemones = mysqli_query($conexion, "SELECT p.*, t.description FROM pokemon p JOIN type t ON p.idType = t.id");
$data= ["pokemones" => $pokemones];

function generateView($content, $data = []){
    include_once('index.php');
}

    generateView('index.php', $data);
