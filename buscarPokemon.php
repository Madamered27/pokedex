<?php
include_once("datos_conexion.php");
include_once ("header.php");

//datos traidos del form del pokemon a buscar
$dato = $_POST["dato"];

$consultarPokemon = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE p.uid = '$dato' OR p.name = '$dato' OR t.description = '$dato'");

$conexion->close();
?>

<!-- Tabla -->
<div class="pokedex">
    <table>
        <tr>
            <th>Imagen</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>

        <?php

        foreach ($consultarPokemon as $pokemon) {
            echo '<tr><td><a href="detalle_pokemon.php?pokemonId='.$pokemon["uid"].'"><img src="' . $pokemon['url_img'] . '" width="100" height="100" /></a></td>';
            echo "<td>" . $pokemon["uid"] . "</td>";
            echo "<td>" . $pokemon['name'] . "</td>";
            echo '<td><img title="' . $pokemon['typeDescription'] . '" src="img/' . $pokemon['typeDescription'] . '.png" width="50" height="50" /></td>';
            echo "<td>" . $pokemon['description'] . "</td></tr>";
        } ?>

    </table>
</div>
