<?php
require_once("permisos.php");
include_once("header.php");
include_once("consultaDatosPokemonAnterior.php");

echo '
 <div class="container">
   
        <h3 style="color: #F1F1F1FF">Ingrese los datos que desea modificar al pokemon ' . $pokemonAnterior["name"] . '</h3>
   
            <form action="editar_pokemon.php" method="post" ENCTYPE="multipart/form-data"><br>
                <div class="mb-3">
                    <input type="number" class="form-control" name="uid" min="0" placeholder="ID Pokemon">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="description" placeholder="Descripcion">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: #F1F1F1FF">Tipo</label>
                    <select name="typeId" class="form-select">
        <option value="3">Fuego</option>
        <option value="1">Agua</option>
        <option value="2">Tierra</option>
        <option value="4">Aire</option>
    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label" style="color: #F1F1F1FF">Imagen</label>
                    <input type="file" class="form-control" name="image">
                </div>
                
                    <input type="hidden" name="idOld" value="' . $pokemonAnterior["uid"] . '">
                    <input type="hidden" name="imageOld" value="' . $pokemonAnterior["url_img"] . '">
                    <input type="hidden" name="typeDescriptionOld" value="' . $pokemonAnterior["typeDescription"] . '">
                    <input type="hidden" name="descriptionOld" value="' . $pokemonAnterior["description"] . '">
                    <input type="hidden" name="nameOld" value="' . $pokemonAnterior["name"] . '">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3 w-100 p-2">Modificar</button>
                </div>
            </form>
        </div>


'
?>