<?php

    require_once("datos_conexion.php");

    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];


    if($conexion->connect_errno){
        echo "No se pudo conectar con el servidor " . $conexion->connect_errno;
        exit();
    }

    $conexion->set_charset("utf8");

    $consulta = "SELECT * FROM user WHERE user = '$usuario'  AND password = '$contrasenia'";

    $resultado = $conexion->query($consulta);

    //por si consulta falla o esta mal escrita
    if($conexion->errno){
        die($conexion->errno);
    }

    $numero_registro = $resultado->num_rows;


    if($numero_registro !=0){
        session_start();

        $_SESSION["usuario"] = $_POST["usuario"];

        header("location:index.php");

    }else{
        header("location:login.php");
    }


