<?php

$conexion = mysqli_connect("localhost", "root", "", "pokedex");

$pokemonId = $_GET["pokemonId"];

$consultaPokemon = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE uid = '$pokemonId'");

$pokemonADetallar = mysqli_fetch_array($consultaPokemon);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles/index.css">
    <title>Index</title>
</head>
<body>
<div class="header-bar">
    <img src="../img/pokeball.png" width="80" height="80">
    <img src="../img/titulo.png" height="80">

</div>
<div class="search-bar">
    <form action="">
        <input placeholder="Ingrese el nombre, tipo o número de pokemón">
        <button type="submit">¿Quién es este tipo de pokemón?</button>
    </form>
</div>


<div class="pokedex">
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>

        <?php

        echo '<tr><td><img src="../' . $pokemonADetallar['url_img'] . '" width="100" height="100" /></td>';
        echo "<td>" . $pokemonADetallar['name'] . "</td>";
        echo '<td><img title="' . $pokemonADetallar['typeDescription'] . '" src="../img/' . $pokemonADetallar['typeDescription'] . '.png" width="50" height="50" /></td>';
        echo "<td>" . $pokemonADetallar['description'] . "</td></tr>";
        ?>
    </table>
</div>
<div class="nuevo">

    <a class="nuevo" href="">
        <button>Nuevo pokemón</button>
    </a>
</div>
</body>
</html>





