<?php

include_once ("header.php");

echo '
        <div class="container">
            Ingrese los datos del nuevo pokemon

            <form action="alta_pokemon.php" method="post" ENCTYPE="multipart/form-data"><br>
               <label>Id: </label>
    <input type="text" name="idPokemon"> <br><br>
    <label>Nombre: </label>
    <input type="text" name="nombrePokemon"> <br><br>
    <label>Tipo: </label>
    <select name="tipoPokemon">
        <option value="3">Fuego</option>
        <option value="1">Agua</option>
        <option value="2">Tierra</option>
        <option value="4">Aire</option>

    </select>
    <label>Descripción: </label>
    <input type="text" name="descripcionPokemon"> <br><br>
    <label>Imagen: </label>
    <input type="file" name="imagenPokemon"> <br><br>

    <input type="submit" name="enviar" value="Añadir Pokemon">
            </form>
        </div>';
?>
