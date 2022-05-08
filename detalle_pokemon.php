<?php

include_once("datos_conexion.php");
include_once ("header.php");
include_once ("searchbar.php");

$pokemonId = $_GET["pokemonId"];

$consultaPokemon = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE uid = '$pokemonId'");

$pokemonADetallar = mysqli_fetch_array($consultaPokemon);
?>
<div class="container pokedex text-center">
    <table>

        <?php

        echo '<tr ><td class="detalle"><img src="' . $pokemonADetallar['url_img'] . '" width="500" height="500" /></td></tr>';
        echo "<tr ><td class='detalle'>" . $pokemonADetallar['name'] . "</td></tr>";
        echo "<tr ><td class='detalle'>" . $pokemonADetallar['uid'] . "</td></tr>";
        echo '<tr><td class="detalle"><img title="' . $pokemonADetallar['typeDescription'] . '" src="img/' . $pokemonADetallar['typeDescription'] . '.png" width="50" height="50" /></td></tr>';
        echo "<tr><td class='detalle'>" . $pokemonADetallar['description'] . "</td></tr>";
        ?>
    </table>
    <br><a href='index.php' class="volver">Volver al inicio</a>
</div>


</body>
</html>





