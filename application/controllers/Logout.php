<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	
	function __construct() {
		parent::__construct();
		
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		
		// cargamos el modelo usuario
		$this->load->model('UsuarioHistorico');
	}
	
	
	public function index()
	{
		
		$username = $this->session->userdata('id_usuario');
		
		// insertamos
		$this->UsuarioHistorico->registrar_logout($username);
		
		$this->session->sess_destroy();
		redirect(base_url() . 'index.php/Login');
	}
	
	
}
