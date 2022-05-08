<?php
include_once("datos_conexion.php");
include_once ("header.php");

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

<?php
include_once("scriptsBootstrap.php");
?>
</body>
</html>


