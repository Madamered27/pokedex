<?php
session_start();

$habilitado = isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "admin";

if (!$habilitado) {
    header("location: login.php");
}