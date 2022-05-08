<?php
session_start();

$habilitado = isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "admin";

include_once("consulta_db.php");
include_once("consulta.php");
include_once("header.php");
include_once("searchbar.php");


if ( isset( $_GET["mensaje"] ) ) {
    $mensaje = $_GET["mensaje"];
    echo '<div class="alert alert-success" role="alert">' . $mensaje . '</div><br>';
}

?>

<!-- Tabla -->
<div class="pokedex container">
    <table>
        <tr>
            <th>Imagen</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <?= $habilitado ? "<th>ABM</th>" : "" ?>
        </tr>

    <?php
        foreach ($data["pokemones"] as $pokemon){
            echo <<<DATA
                <tr>
                    <td>
                        <a href="detalle_pokemon.php?pokemonId=$pokemon[uid]"></a>
                        <img src="{$pokemon["url_img"]}" width="100" height="100"/>
                    </td>
                    <td>$pokemon[uid]</td>
                    <td>$pokemon[name]</td>
                    <td>
                        <img title="{$pokemon["typeDescription"]}" src="img/{$pokemon["typeDescription"]}.png" width="50" height="50"/>
                    </td>
                    <td>$pokemon[description]</td>
            DATA;
            if( $habilitado ){
                echo <<<ABM
                    <td>
                        <a href="formEliminar.php?pokemonId={$pokemon["uid"]}">Eliminar</a>
                    </td>
                    <td>
                        <a href="formEditar.php?pokemonId={$pokemon["uid"]}">Editar</a>
                    </td>
                </tr>
                ABM;
            }
            else{ echo "</tr>"; }
        }
    ?>
    </table>
</div>

<?php
    include_once("newPokemon.php");
    include_once("scriptsBootstrap.php");
?>

</body>
</html>