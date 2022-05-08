<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- ESTILOS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles/index.css">

    <!-- FAVICON -->
    <link rel="icon" href="./img/favicon.png"/>

    <title>Pokedex - Ingresar</title>
</head>


    <body class="bg-fondo">

    <a href="index.php" class="cerrar">
        <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
    </a>

        <div class="container d-flex flex-column mh-100 justify-content-center align-items-center">

            <div class="card mb-5 p-5 bg-dark text-white col-md-5 tarjeta">
                <div class="text-center">
                    <h3 class="tituloPokedex">Pokedex</h3>
                </div>
                <div class="card-body mt-3">

                    <form action="comprueba_login.php" method='post'>
                        <div class="input-group form-group mt-3">
                            <input type="text"
                                   class="form-control text-center p-3"
                                   placeholder="Usuario" name="usuario">
                        </div>
                        <div class="input-group form-group mt-3">
                            <input type="password"
                                   class="form-control text-center p-3"
                                   placeholder="Contraseña" name="contrasenia">
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Ingresar"
                                   class="btn btn-primary mt-3 w-100 p-2"
                                   name="login-btn">
                        </div>
                    </form>

                </div>
            </div>
        </div>



    </body>
</html>