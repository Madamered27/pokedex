<?php
// funcion para editar pokemon

$conexion = mysqli_connect("localhost", "root", "", "pokedex");

//campos del form del pokemon que quiero modificar
$idPokemon = $_POST["uid"];
$nombrePokemon = $_POST["name"];
$descripcionPokemon = $_POST["description"];
$tipoPokemon = $_POST["typeId"];
$imagenPokemon = $_FILES["image"];

//variable para armar la url de la imagen nueva
$urlImagenNueva = "img/" . $_FILES["image"]["name"];

//campos que traemos ocultos para imprimir como datos del pokemon anterior
$idOld = $_POST["idPokemon"];
$nameOld = $_POST["nameOld"];
$descriptionOld = $_POST["descriptionOld"];
$typeDescriptionOld = $_POST["typeDescriptionOld"];
$imageOld = $_POST["imageOld"];


//función para guardar la imagen del la subida temporal a la carpeta img
function copiarArchivoSubidoDeCarpetaTemporalADestino($destination)
{
    return move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
}
copiarArchivoSubidoDeCarpetaTemporalADestino("./img/" . $_FILES["image"]["name"]);

//consulta para modificar en la bd
mysqli_query($conexion, "UPDATE pokemon SET uid = '$idPokemon', name = '$nombrePokemon', description = '$descripcionPokemon', idType = '$tipoPokemon', url_img = '$urlImagenNueva' WHERE uid = '$idOld'");

//consulta para buscar los datos del pokemon modificado y así imprimir en pantalla
$pokemonConsultado = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE uid = '$idPokemon'");
$pokemon = ["pokemon" => $pokemonConsultado];


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

</div>
<div class="search-bar">
    <form action="">
        <input placeholder="Ingrese el nombre, tipo o número de pokemón">
        <button type="submit">¿Quién es este tipo de pokemón?</button>
    </form>
</div>

<div class="container">
    <?php
    echo '<div class="alert alert-success" role="alert">
  ¡El pokemon ' . $nameOld . ' fue editado con éxito!
</div><br>'
    ?>
</div>

<div class="pokedex">

    <table>
        <tr>
            <th>Imagen anterior</th>
            <th>Id anterior</th>
            <th>Nombre anterior</th>
            <th>Tipo anterior</th>
            <th>Descripción anterior</th>
        </tr>

        <?php

        echo '<tr><td><img src="' . $imageOld . '" width="100" height="100" /></td>';
        echo "<td>" . $nameOld . "</td>";
        echo "<td>" . $nameOld . "</td>";
        echo '<td><img title="' . $typeDescriptionOld . '" src="img/' . $typeDescriptionOld . '.png" width="50" height="50" /></td>';
        echo "<td>" . $descriptionOld . "</td>";
        echo '<tr class="modificacion">
<td class="modificacion">↓</td>
<td>↓</td>
<td>↓</td>
<td>↓</td>
</tr>';
        ?>

        <tr>
            <th>Imagen actual</th>
            <th>Id Actual</th>
            <th>Nombre actual</th>
            <th>Tipo actual</th>
            <th>Descripción actual</th>
        </tr>

        <?php
        foreach ($pokemon["pokemon"] as $pokemon) {
            echo '<tr><td><img src="' . $pokemon["url_img"] . '" width="100" height="100" /></td>';
            echo "<td>" . $pokemon["uid"] . "</td>";
            echo "<td>" . $pokemon["name"] . "</td>";
            echo '<td><img title="' . $pokemon['typeDescription'] . '" src="img/' . $pokemon['typeDescription'] . '.png" width="50" height="50" /></td>';
            echo "<td>" . $pokemon["description"] . "</td>";
        }
        ?>
    </table>


    <br><a href='index.php' class="volver">Volver al inicio</a>
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



