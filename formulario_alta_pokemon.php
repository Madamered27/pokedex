<html>
<body>

<h1>Añadir un Pokemon a la Pokedex</h1>


<form action="alta_pokemon.php" method='post'>
    <label>Identificador: </label>
    <input type='text' name='idPokemon'> <br><br>
    <label>Nombre Pokemon: </label>
    <input type='text' name='nombrePokemon'> <br><br>
    <label>Tipo: </label>
    <select name="tipoPokemon">
        <option value="3">Fuego</option>
        <option value="1">Agua</option>
        <option value="2">Tierra</option>
        <option value="4">Aire</option>

    </select>
    <label>Descripción: </label>
    <input type='text' name='descripcionPokemon'> <br><br>
    <label>Imagen: </label>
    <input type='text' name='imagenPokemon'> <br><br>

    <input type='submit' name='enviar' value="Añadir Pokemon">
</form>



</body>
</html>
