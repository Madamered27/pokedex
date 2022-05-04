<?php

function consultar_db($sql){
    $data = [];

    $config = parse_ini_file('config/db.ini');

    $connection = mysqli_connect($config["host"], $config["user"], $config["pass"], $config["db"]);

    if(!$connection) return mysqli_connect_error();

    $query = mysqli_query($connection, $sql);

    $rows = mysqli_num_rows($query);

    if($rows == 0){
        echo "no devolvio una mierda tu consulta hijo de puta";
    }
    else{
        $data = mysqli_fetch_all($query , MYSQLI_ASSOC);
    }

    mysqli_close($connection);

    return $data;
}
