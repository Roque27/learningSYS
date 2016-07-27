<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class TestUsuario extends MY_Controller {
	
	function __construct() {
		
		parent::__construct();

		$this->load->helper(array('url', 'form'));
		
		// asd
	}
	
	
	public function index()
	
	{
		log_message ( "debug", "TestUsuario:index() " );
	
		
		// llamas al modelo
		
		
		$this->load->model('Materia');
		
		
		// pedimos al modelo que consulte el usuario
		$materia = $this->Materia->get_materia(1);
		
		if($materia != null)
		{
		//echo "hay datos";
			$data = array(
						'id_materia'=> $materia->id_materia,
						'nombre' =>	$materia->nombre,
						'descripcion' => $materia->descripcion
						);
		
		
			// mostrar vista
			$this->showView('test/test', $data);
		}

		
	}
	
	
}


	