<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends MY_Controller {

	function __construct() {
		parent::__construct();
	
		// helper url
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	public function index()
	{
		
		log_message("debug","Contacto index()");
		
		
		//views 
		$this->showView('contacto');		
		
	}
	
	public function send_info()
	{
	
		log_message("debug","Contacto index()");
	
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$email = $this->input->post('email');
		$comentario = $this->input->post('comentario');
		
		$data = array('nombre'=>$nombre,'apellido'=>$apellido,'email'=>$email,'comentario'=>$comentario);
		
		$this->load->model('interesado');
		
		$this->interesado->save($data);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('status'=>0,'message' => 'mensaje a mostrar')));
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Contacto.php */