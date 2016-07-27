<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public $publicidades;
	
	
	/*
		La clase MY_Controller hereda de CI_Controller
		
	*/
	function __construct() 
	{
		parent::__construct();
                
		$this->load->library(array('session', 'form_validation'));
		
		$this->load->helper(array('url', 'form'));
		
		
		// cargamos las publicidades
		$this->load->model('publicidad');
		$publicidades_result = $this->publicidad->get_all();
		$this->publicidades['lista_publicidades'] = $publicidades_result;
		
		$this->config->load('learningSYS_config');
	}
	
	
	
	function showView($page, $data = array())
	{
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		
		// cargamos el header
		$this->load->view('templates/header', array('isLoggedIn'=> $isLoggedIn));
		
		// cargamos el body
		$this->load->view($page, $data);
		
		// cargamos publicidad
		$this->load->view('publicidad', $this->publicidades);
		
		// cargamos footer
		$this->load->view('templates/footer');
		
	}
	
	function showViewPostLogin ($page, $data = array())
	{
		
		$username = $this->session->userdata('username');
		$lista_recursos = $this->session->userdata('lista_recursos');
		$id_rol = $this->session->userdata('id_rol');
		$nombre_rol = $this->session->userdata('nombre_rol');
		
		
		
		// cargamos el header
		
		$header_data = array('username'=> $username,
							'id_rol'=>$id_rol,
							'nombre_rol'=>$nombre_rol	,
							'lista_recursos'=>$lista_recursos);
		
		if (isset($data->css_files)){
			$header_data['css_files'] =	$data->css_files;
		}
		
		if (isset($data->js_files)){
			$header_data['js_files'] =	$data->js_files;
		}
		
		if (MY_Controller::isRolAlumno()){
			$this->load->view('templates/alumnos/header',$header_data);
		}else{
			$this->load->view('templates/admin/header',$header_data);
		}
		 
				
		
		// cargamos el body
		$this->load->view($page, $data);
		
		// cargamos publicidad
		//$this->load->view('publicidad');
		
		// cargamos footer 
		$this->load->view('templates/admin/footer');
		
		
	}
	
	
	public static function isRolAlumno()
	
	{
	
		$rol_name = MY_Controller::get_instance()->session->userdata('nombre_rol');
	
		if ($rol_name == "alumno"){
			return true;
		}
	
		return false;
	
	}
        
        

}


// Admin controller

class MY_Admin_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();

		// verificamos si el usuario no esta logueado
		if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/Login');
		}
		
		if ( MY_Controller::isRolAlumno()){
			
			redirect('/Deny');
			
		}
		
		// verificamos si el usuario tiene permisos para la vista
		
		$lista_recursos_usuario = $this->session->userdata('lista_recursos');
		$url_segmento = "";
		
		if ($this->uri->segment(2)){
			$url_segmento = $this->uri->segment(2);
		}
		
		if (!checkAuthorization($lista_recursos_usuario, $this->config->item ( 'recursos' ), $url_segmento)){
			
			redirect('/Admin/Deny');
			
		}
		
		

	}
	
	
	
	

}



class MY_Alumno_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();

		// verificamos si el usuario no esta logueado
		if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/Login');
		}

		// verificamos si el usuario tiene permisos para la vista

		$lista_recursos_usuario = $this->session->userdata('lista_recursos');
		
		$url_segmento = "";

		if ($this->uri->segment(2)){
			$url_segmento = $this->uri->segment(2);
		}

		
		if (!checkAuthorization($lista_recursos_usuario, $this->config->item('recursos'), $url_segmento)){
				
			redirect('/Deny');
				
		}
		


	}


}








