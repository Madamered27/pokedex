<?php
include_once("datos_conexion.php");

//datos traidos del form del pokemon a buscar
$dato = $_POST["dato"];

$consultarPokemon = mysqli_query($conexion, "SELECT p.*, t.description as typeDescription FROM pokemon p JOIN type t ON p.idType = t.id WHERE p.uid = '$dato' OR p.name = '$dato' OR t.description = '$dato'");


$conexion->close();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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


<div class="pokedex">
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>

        <?php
        foreach ($consultarPokemon as $pokemon){
            echo '<tr><td><img src="' . $pokemon['url_img'] . '" width="100" height="100" /></td>';
            echo "<td>" . $pokemon['name'] . "</td>";
            echo '<td><img title="' . $pokemon['typeDescription'] . '" src="img/' . $pokemon['typeDescription'] . '.png" width="50" height="50" /></td>';
            echo "<td>" . $pokemon['description'] . "</td></tr>";
        }
        ?>
    </table>
</div>
<div class="nuevo">

    <a class="nuevo" href="">
        <button>Nuevo pokemón</button>
    </a>
</div>
</body>
</html>
