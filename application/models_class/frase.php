<?php

class Frase_class {

    var $idFrase;
    var $frase;
    
    function __construct($idFrase, $frase)
    {
    	$this->idFrase = $idFrase;
    	$this->frase = $frase;
    }
}