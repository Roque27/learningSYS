<?php

class Usuario {

	var $nombre;
	var $apellido;
	var $rol;
}

class Rol {
	
	var $id_rol;
	var $descripcion;
}

$usuario = new Usuario();
$usuario->nombre = "pedro";

$rol = new Rol();
$rol->id_rol = 1;
$rol->descripcion = 'administrator';

$usuario->rol = $rol;

echo 'nombre Usuario: ' . $usuario->nombre;
echo 'id_rol: ' . $usuario->rol->id_rol;





