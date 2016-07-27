<?php

class UsuarioRoles_class {

	var $Usuario;
	var $Roles;

	function __construct($Usuario, $Roles)
	{
		$this->Usuario = $Usuario;
		$this->Roles = $Roles;
	}
}