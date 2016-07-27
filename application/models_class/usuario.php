<?php

class Usuario_class {

	var $idUsuario;
	var $nombreusuario;
	var $nombre;
	var $apellido;
	var $nrodocumento;
	var $mail;
	var $password;

	function __construct($idUsuario, $nombreusuario, $nombre, $apellido, $nrodocumento, $mail, $password)
	{
		$this->idUsuario = $idUsuario;
		$this->nombreusuario = $nombreusuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->nrodocumento = $nrodocumento;
		$this->mail = $mail;
		$this->password = $password;
	}
}