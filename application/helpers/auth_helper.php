<?php

/**
 * Helper class to handle authentication
 */

function encrypt_pwd($plain_pw)
{
	return md5($plain_pw);
}

function checkAuthorization($lista_recursos_usuario, $recursos_sistema, $uri){

	$hasAccess = false;

	$url_seg = $uri;

	log_message('debug','url_seg: ' . $url_seg);
	
	if ( in_array( $url_seg, $recursos_sistema ) ){

		foreach ($lista_recursos_usuario as $recurso){
			log_message('debug', 'recurso: ' . $recurso->nombre_recurso);
				
			if ( $url_seg == $recurso->nombre_recurso ){
				$hasAccess = true;
			}
		}

	}else {
		$hasAccess = true;	
	}

	return $hasAccess;

}
