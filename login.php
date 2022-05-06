<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
    </head>
    <body>
        <h1>Sign In</h1>
        <form action="comprueba_login.php" method='post'>
            <label>Usuario: </label>
            <input type='text' name='usuario'> <br><br>
            <label>Contraseña: </label>
            <input type='password' name='contrasenia'> <br><br>
            <input type='submit' name='enviar' value="Login">
        </form>

    <a href="consulta.php">VER POKEMONES</a>
    </body>
</html>