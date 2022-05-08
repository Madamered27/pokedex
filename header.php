<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">
    <title>Index</title>
</head>
<body>
<div class="header-bar">
    <img src="img/pokeball.png" width="80" height="80">
    <img src="img/titulo.png" height="80">
    <?php
    if ($habilitado) {
        echo "<h1>Estás logueado</h1>";
        echo "<a href='cerrar_sesion.php'>Cerra la sesion pelotudo</a>";
    } else {
        echo "<a href='login.php' CLASS='ingresar'>Ingresar</a>";
    }
    ?>
</div>