<?php
include_once("datos_conexion.php");
include_once("consulta.php");
include_once("header.php");
include_once("searchbar.php");

//datos traidos del form del pokemon a buscar
$variableBuscada = $_POST["variableBuscada"];

$consultarPokemon = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE p.uid = '$variableBuscada' OR p.name = '$variableBuscada' OR t.description = '$variableBuscada'");
$pokemonBuscado = mysqli_fetch_array($consultarPokemon);

$conexion->close();
?>


<body>
<div class="container pokedex text-center">
    <table>
        <tr>
            <th>Imagen</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>

        <?php

        //si buscamos un pokemon inexistente
        if (empty($pokemonBuscado) && !empty($variableBuscada)) {
            echo '<div class="alert alert-danger" role="alert">
  El pokemon buscado no existe en la pokedex :(
</div>';
            foreach ($data["pokemones"] as $pokemon) {
                echo '<tr><td><img src="' . $pokemon['url_img'] . '" width="100" height="100" /></td>';
                echo "<td>" . $pokemon['uid'] . "</td>";
                echo "<td>" . $pokemon['name'] . "</td>";
                echo '<td><img title="' . $pokemon['typeDescription'] . '" src="img/' . $pokemon['typeDescription'] . '.png" width="50" height="50" /></td>';
                echo "<td>" . $pokemon['description'] . "</td></tr>";
            }
            //si no buscamos nada
        } elseif (empty($variableBuscada)) {

            foreach ($data["pokemones"] as $pokemon) {
                echo '<tr><td><img src="' . $pokemon['url_img'] . '" width="100" height="100" /></td>';
                echo "<td>" . $pokemon['uid'] . "</td>";
                echo "<td>" . $pokemon['name'] . "</td>";
                echo '<td><img title="' . $pokemon['typeDescription'] . '" src="img/' . $pokemon['typeDescription'] . '.png" width="50" height="50" /></td>';
                echo "<td>" . $pokemon['description'] . "</td></tr>";
            }
        } //si buscamos un pokemon existente
        else {

            echo '<audio autoplay hidden>
    <source src="assets/pokemon.mp3" type="audio/mp3">
    Tu navegador no soporta audio HTML5.
</audio>';


            foreach ($consultarPokemon as $pokemon) {
                echo '<tr><td><a href="detalle_pokemon.php?pokemonId=' . $pokemon["uid"] . '"><img src="' . $pokemon['url_img'] . '" width="100" height="100" /></a></td>';
                echo "<td>" . $pokemon['uid'] . "</td>";

                echo "<td>" . $pokemon['name'] . "</td>";
                echo '<td><img title="' . $pokemon['typeDescription'] . '" src="img/' . $pokemon['typeDescription'] . '.png" width="50" height="50" /></td>';
                echo "<td>" . $pokemon['description'] . "</td></tr>";
            }
        }


        ?>
    </table>

    <br><a href='index.php' class="volver">Volver al inicio</a>
</div>


</body>
</html>
