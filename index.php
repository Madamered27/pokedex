<?php
    session_start();

    $habilitado = isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "admin";

    include_once("consulta_db.php");
    include_once ("consulta.php");
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
            <img src="img/titulo.png" height="80" >
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
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                </tr>

                    <?php
                        foreach ($data["pokemones"] as $pokemon){
                            echo '<tr><td><a href="detalle_pokemon.php/?pokemonId='.$pokemon['uid'].'"><img src="'.$pokemon['url_img'].'" width="100" height="100" /></a></td>';
                            echo "<td>" . $pokemon['name'] . "</td>";
                            /*echo "<td><button disabled class='". $pokemon['description'] ."'>" . $pokemon['description'] . "</button> </td>";*/
                            echo '<td><img title="'. $pokemon['description'] .'" src="img/'. $pokemon['description'] .'.png" width="50" height="50" /></td>';
                            echo "<td>" . $pokemon['description'] . "</td></tr>";
                        };
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