<?php
// funcion para eliminar pokemon

$conexion = mysqli_connect("localhost", "root", "", "pokedex");

$pokemonAEliminar = $_POST["uidPokemon"];
$nombrePokemonEliminado = $_POST["nombrePokemon"];

mysqli_query($conexion, "DELETE FROM pokemon WHERE uid = '$pokemonAEliminar'");

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">
    <title>Index</title>
</head>
<body>
<div class="header-bar">
    <img src="img/pokeball.png" width="80" height="80">
    <img src="img/titulo.png" height="80">

</div>
<div class="search-bar">
    <form action="">
        <input placeholder="Ingrese el nombre, tipo o número de pokemón">
        <button type="submit">¿Quién es este tipo de pokemón?</button>
    </form>
</div>
<div class="container">

    <?php


    echo '<div class="alert alert-danger" role="alert">
  El pokemon ' . $nombrePokemonEliminado . ' fue eliminado :(
</div>';
    ?>
    <br> <img class="imagenElimiado" src="img/eliminado.png"><br>

    <br><a href='index.php' class="volver">Volver al inicio</a>
</div>
<div class="nuevo">

    <a class="nuevo" href="">
        <button>Nuevo pokemón</button>
    </a>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>


