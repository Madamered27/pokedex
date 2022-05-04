<?php

class Pokedex{

    private $pokemons;

    public function __contructor(){
        $this->pokemons = [];
    }

    public function altaPokemon($pokemon){
            return header("location: alta_pokemon.php");
    }

    public function buscarPokemon($pokemon){

    }

}