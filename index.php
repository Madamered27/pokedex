<?php
session_start();

$habilitado = isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "admin";

include_once("consulta_db.php");
include_once("consulta.php");

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">
    <title>Index</title>
</head>
<body>
<div class="header-bar">
    <img src="img/pokeball.png" width="80" height="80">
    <img src="img/titulo.png" height="80">
    <?php
    if ($habilitado) {
        echo "<h1>Estás logueado</h1>";
        echo "<a href='cerrar_sesion.php'>Cerra la sesion pelotudo</a>";
    } else {
        echo "<a href='login.php' CLASS='ingresar'>Ingresar</a>";
    }
    ?>
</div>
<div class="search-bar">
    <form action="">
        <input placeholder="Ingrese el nombre, tipo o número de pokemón">
        <button type="submit">¿Quién es este tipo de pokemón?</button>
    </form>
</div>
<div class="pokedex">
    <table>
        <tr>
            <th>Imagen</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>¿Qué desea hacer?</th>
        </tr>

        <?php
        foreach ($data["pokemones"] as $pokemon) {
            echo '<tr><td><a href="detalle_pokemon.php/?pokemonId=' . $pokemon['uid'] . '"><img src="' . $pokemon['url_img'] . '" width="100" height="100" /></a></td>';
            echo "<td>".$pokemon["uid"]."</td>";
            echo "<td>" . $pokemon['name'] . "</td>";
            /*echo "<td><button disabled class='". $pokemon['description'] ."'>" . $pokemon['description'] . "</button> </td>";*/
            echo '<td><img title="' . $pokemon['typeDescription'] . '" src="img/' . $pokemon['typeDescription'] . '.png" width="50" height="50" /></td>';
            echo "<td>" . $pokemon['description'] . "</td>";

            echo '

                            <!-- Button trigger modal -->
<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar' . $pokemon["name"] . '">
  Eliminar
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar' . $pokemon["name"] . '">
  Editar
</button></td></tr>';


            echo '<!-- Modal Eliminar -->
        <div class="modal fade" id="eliminar' . $pokemon["name"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                    <div class="modal-body">
                        ¿Está seguro que desea eliminar el pokemon ' . $pokemon["name"] . '?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="eliminar_pokemon.php" method="post">
                        <input type="hidden" name="uidPokemon" value="' . $pokemon["uid"] . '">
                        <input type="hidden" name="nombrePokemon" value="' . $pokemon["name"] . '">
                         <input class="btn btn-primary" type="submit" value="Confirmar" />
                         </form>
                    </div>
                </div>
            </div>
            </div>

';
            echo '<!-- Modal Editar -->
        <div class="modal fade" id="editar' . $pokemon["name"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Ingrese los datos que desea modificar al pokemon ' . $pokemon["name"] . '
                        
                        <form action="editar_pokemon.php" method="post" ENCTYPE="multipart/form-data"><br>
                        <div class="mb-3">
    <label class="form-label">Id</label>
    <input type="number" class="form-control" name="uid" min="0">
  </div>
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="description">
  </div>
  <div class="mb-3">
    <label class="form-label">Tipo</label>
    <input type="number" class="form-control" name="typeId" placeholder="1=AGUA, 2=TIERRA, 3=FUEGO, 4=AIRE" min="0" max="4">
  </div>
  <div class="mb-3">
    <labelclass="form-label">Imagen</label>
    <input type="file" class="form-control" name="image">
  </div>
  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="idOld" value="' . $pokemon["uid"] . '">
                        <input type="hidden" name="imageOld" value="' . $pokemon["url_img"] . '">
                        <input type="hidden" name="typeDescriptionOld" value="' . $pokemon["typeDescription"] . '">
                        <input type="hidden" name="descriptionOld" value="' . $pokemon["description"] . '">
                        <input type="hidden" name="nameOld" value="' . $pokemon["name"] . '">
                        </form>
                    </div>
                </div>
                
            </div>
            </div>';
        } ?>
    </table>
</div>
<div class="nuevo">

    <a class="nuevo" href="">
        <button>Nuevo pokemón</button>
    </a>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>