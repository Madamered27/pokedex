<?php

include_once ("pokedex.php");

class Administrador extends Usuario {

    private $pass;

    public function __construct($nombreUsuario,$pass){
        parent::__constructor($nombreUsuario);
        $this->pass = $pass;
    }

    public function loguearse($nombreUsuario, $pass){
        return header("location:login.php");
    }

    public function darDeAltaPokemon($pokemon, $pokedex){
        return $pokedex->altaPokemon($pokemon);
    }

}