<?php

include_once ("header.php");
include_once ("consultaDatosPokemonAnterior.php");


echo '
 <div class="container">
            ¿Está seguro que quiere eliminar al pokemon ' . $pokemonAnterior["name"] . '?

            <form action="eliminar_pokemon.php" method="post">
                <input type="hidden" name="uidPokemon" value="' . $pokemonAnterior["uid"] . '">
                <input type="hidden" name="nombrePokemon" value="' . $pokemonAnterior["name"] . '">
                <input class="btn btn-primary" type="submit" value="Confirmar" />
            </form>
        </div>


'
?>
