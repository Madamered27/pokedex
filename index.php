<?php
    session_start();

    $habilitado = isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "admin";

    include_once("consulta_db.php");
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
            <h1>Logo</h1>
            <h1>Pokédex</h1>
            <?php
                if ($habilitado) {
                    echo "<h1>Estás logueado</h1>";
                    echo "<a href='cerrar_sesion.php'>Cerra la sesion pelotudo</a>";
                } else {
                    echo "<a href='login.php'>Logueate</a>";
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
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Nombre</th>
                    <?php
                        if ($habilitado) echo "<th>Acciones</th>";
                    ?>
                </tr>
                <tr>
                    <td>imagen xd</td>
                    <td>fueguito</td>
                    <td>1</td>
                    <td>vamo a calmarno</td>
                    <?php
                        if ($habilitado) echo "<td><a>baja</a><a>Modificar</a></td>";
                    ?>
                </tr>
            </table>
            <a class="nuevo" href="">
                <button>Nuevo pokemón</button>
            </a>
        </div>
    </body>
</html>