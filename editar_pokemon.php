<?php

include_once("datos_conexion.php");
include_once ("header.php");

//campos del form del pokemon que quiero modificar
$idPokemon = $_POST["uid"];
$nombrePokemon = $_POST["name"];
$descripcionPokemon = $_POST["description"];
$tipoPokemon = $_POST["typeId"];
$imagenPokemon = $_FILES["image"];

//variable para armar la url de la imagen nueva
$urlImagenNueva = "img/" . $_FILES["image"]["name"];

//campos que traemos ocultos para imprimir como datos del pokemon anterior
$idOld = $_POST["idOld"];
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


mysqli_query($conexion, "UPDATE pokemon SET uid = '$idPokemon', name = '$nombrePokemon', description = '$descripcionPokemon', idType = '$tipoPokemon', url_img = '$urlImagenNueva' WHERE uid = '$idOld'");



//consulta para buscar los datos del pokemon modificado y así imprimir en pantalla
$pokemonConsultado = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE uid = '$idPokemon'");
$pokemon = ["pokemon" => $pokemonConsultado];

$conexion->close();
?>


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
        echo "<td>" . $idOld . "</td>";
        echo "<td>" . $nameOld . "</td>";
        echo '<td><img title="' . $typeDescriptionOld . '" src="img/' . $typeDescriptionOld . '.png" width="50" height="50" /></td>';
        echo "<td>" . $descriptionOld . "</td>";
        echo '<tr class="modificacion">
<td class="modificacion">↓</td>
<td>↓</td>
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
</div>

<?php
include_once("scriptsBootstrap.php");
?>

</body>
</html>



