<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">

    <!-- FAVICON -->
    <link rel="icon" href="img/favicon.png"/>

    <title>Index</title>
</head>
<body>
<div class="header-bar container-fluid">
    <img src="img/pokeball.png" width="80" height="80">
    <img src="img/titulo.png" height="80">
    <?php
    if ($habilitado) {
        echo "<h1>Estás logueado</h1>";
        echo "<a href='cerrar_sesion.php'>Cerrar sesión</a>";
    } else {
        echo "<a href='login.php' CLASS='ingresar'>Ingresar</a>";
    }
    ?>
</div>