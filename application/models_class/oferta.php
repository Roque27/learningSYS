<?php

class Imagen_class {

	var $idOferta;
	var $frase;
	var $imagen;
	var $fechaExpiracion;

	function __construct($idOferta, $frase, $imagen, $fechaExpiracion)
	{
		$this->idOferta = $idOferta;
		$this->frase = $frase;
		$this->imagen = $imagen;
		$this->fechaExpiracion = $fechaExpiracion;
	}
}