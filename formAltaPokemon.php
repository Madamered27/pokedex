<?php
require_once ("permisos.php");
include_once ("header.php");

echo '
        <div class="container">
            <h3 style="color: #F1F1F1FF">Ingrese los datos del nuevo pokemon</h3>

        <form action="alta_pokemon.php" method="post" ENCTYPE="multipart/form-data">
        <div class="mb-3">
            <input type="text" name="idPokemon" placeholder="Id Pokemon" class="form-control"> 
        </div>
        <div class="mb-3">
            <input type="text" name="nombrePokemon" placeholder="Nombre Pokemon" class="form-control">
        </div>
    <label style="color: #F1F1F1FF">Tipo: </label>
    <select name="tipoPokemon" class="form-select">
        <option value="3">Fuego</option>
        <option value="1">Agua</option>
        <option value="2">Tierra</option>
        <option value="4">Aire</option>
    </select>
    <div class="mb-3">
        <label class="form-label" style="color: #F1F1F1FF">Imagen: </label>
        <input type="file" class="form-control" name="imagenPokemon"> <br><br>
    </div>
    <div class="mb-3">
        <input type="text" name="descripcionPokemon" class="form-control" placeholder="Descripcion"> 
    </div>
    <input type="submit" name="enviar" value="Añadir Pokemon" class="btn btn-primary">
            </form>
        </div>';
?>
