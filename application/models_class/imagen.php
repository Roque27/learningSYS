<?php

class Imagen_class {

    var $idImagen;
    var $ancho;
    var $alto;
    var $binarioImagen;
    
    function __construct($idImagen, $ancho, $alto, $binarioImagen)
    {
    	$this->idImagen = $idImagen;
    	$this->ancho = $ancho;
    	$this->alto = $alto;
    	$this->binarioImagen = $binarioImagen;
    }
}