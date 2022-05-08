<?php
require_once ("permisos.php");
include_once ("header.php");
include_once ("consultaDatosPokemonAnterior.php");


echo '
 <div class="container text-center">
    <h3 style="color: #F1F1F1FF">
        ¿Está seguro que quiere eliminar al pokemon ' . $pokemonAnterior["name"] . '?
    </h3>
            <form action="eliminar_pokemon.php" method="post">
                <input type="hidden" name="uidPokemon" value="' . $pokemonAnterior["uid"] . '">
                <input type="hidden" name="nombrePokemon" value="' . $pokemonAnterior["name"] . '">
                <input class="btn btn-primary" type="submit" value="Confirmar" />
            </form>
        </div>


'
?>
