<?php
require_once("permisos.php");

include_once("datos_conexion.php");
include_once("header.php");

$pokemonAEliminar = $_POST["uidPokemon"];
$nombrePokemonEliminado = $_POST["nombrePokemon"];

mysqli_query($conexion, "DELETE FROM pokemon WHERE uid = '$pokemonAEliminar'");


/*if ($afectados != 0) {
    echo "Se elimino el Pokemon";
}
//por si consulta falla o esta mal escrita
if ($conexion->errno) {
    die($conexion->errno);
}
*/

$conexion->close();
?>

<div class="container pokedex text-center">

    <?php
    echo '<div class="alert alert-danger" role="alert">
  El pokemon ' . $nombrePokemonEliminado . ' fue eliminado :(
</div>';
    ?>

    <div class="container d-flex ">
        <img class="imagenElimiado" src="img/eliminado.png" style="margin: auto; display: block">
    </div>

    <br><a href='index.php' class="volver">Volver al inicio</a>
</div>
</div>

<?php
include_once("scriptsBootstrap.php");
?>
</body>
</html>


