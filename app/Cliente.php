<?php
namespace App;

class Cliente{
    private $RFC = "";
    private $nombre= "";
    private $edad= 0;
    private $idCiudad= 0;

    public function __construct($RFC, $nombre, $edad, $idCiudad)
    {
        $this->RFC = $RFC;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->idCiudad = $idCiudad;
    }

    function getRFC(){
        return $this->RFC;
    }
    public function getnombre(){
        return $this->nombre;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getIdCiudad(){
        return $this->idCiudad;
    }
}