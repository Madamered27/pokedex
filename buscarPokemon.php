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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">
    <title>Index</title>
</head>
<body>

<audio autoplay hidden>
    <source src="assets/pokemon.mp3" type="audio/mp3">
    Tu navegador no soporta audio HTML5.
</audio>

<div class="header-bar container-fluid">
    <img src="img/pokeball.png" width="80" height="80">
    <img src="img/titulo.png" height="80">

</div>

<div class="container">
    <form action="buscarPokemon.php" method="post">
        <div class="input-group mb-3">
            <input type="text" name="dato" class="form-control" aria-describedby="button-addon2" placeholder="Ingrese el nombre, tipo o número de pokemón">
            <button type="submit" class="btn btn-outline-secondary buscar" id="button-addon2">¿Quien es este Pokemon?</button>
        </div>
    </form>
</div>


<div class="container pokedex">
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



<div class="nuevo container">
    <a class="nuevo" href="">
        <button>Nuevo pokemón</button>
    </a>
</div>


</body>
</html>
