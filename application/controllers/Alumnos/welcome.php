<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class welcome extends MY_Alumno_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->load->model('materia');
		
	}
	
	
	
	public function index() 

	{
		log_message ( "debug", "welcome alumnos() " );
		
		
		$result = $this->materia->get_all_materias();
		
		$data = array('materias'=>$result);
		
		// mostrar vista
		$this->showViewPostLogin('alumnos/evaluaciones_alumnos_view.php', $data);
	
	}
	
}