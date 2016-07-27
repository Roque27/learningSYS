<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Examen extends MY_Alumno_Controller {
	
	
	
	
	function __construct() {
		
		parent::__construct();
	
		$this->load->helper('date');
		$this->load->model('evaluacion_model');
		$this->load->model('materia');
		
		
		
	}
	
	
	
	public function index() 

	{
	
		//views
		$this->showViewPostLogin('alumnos/evaluaciones_alumnos_view.php');
		
	}
	
	
	// boton generar del alumno
	public function generar_evaluacion(){
		
		$id_materia = $this->input->post('id_materia');
		$id_tema 	= $this->input->post('id_tema');
		
		$cant_preg = $this->config->item ('cant_preguntas');
		
		// gemeramos la evaluacion
		$result = $this->evaluacion_model->generar_evaluacion($id_materia, $id_tema, $cant_preg);
		
		// si no hay pregunts cargadas para el tema y materia mostramos un error generico
		if($result == null)
		{
			$this->showViewPostLogin('common_error');
			
		}
		
		else 
		
		{
			
			$pregu44ntas_ids = array();
			
			foreach ($result as $value)
			{
				$preguntas_ids[] = $value['id_pregunta'];
			}
			
			$data = array(
					'id_materia'=>$id_materia,
					'id_tema'=>$id_tema,
					'preguntas_ids'=>$preguntas_ids
			);
			
			
			$this->session->set_userdata('evaluacion_usuario', $data);
			
			$id_usuario = $this->session->userdata('id_usuario');
			
			// insertamos la evaluacion para tenerla
			$id = $this->evaluacion_model->inserta_evaluacion($id_materia, $id_tema, $id_usuario);
			
			redirect('/Alumnos/Examen/get_evaluacion/id_eval/' . $id);
		}
		
		
		
		
		
		
	}
	
	
	
	function get_evaluacion($id_eval=0){
		
		$eval_usuario = $this->session->userdata('evaluacion_usuario');
		
		$eval_usuario['preguntas'] = $this->evaluacion_model->get_preguntas_respuestas($eval_usuario['preguntas_ids']);

		$viewData = array('viewdata'=>$eval_usuario);
		
		
		// vista
		$this->showViewPostLogin('alumnos/start_examen_view.php', $viewData);
		
	}
	
	
	function getTemas($id_materia=null){
		
		$data = array();
		
		if ($id_materia != null){
			
			$materias = $this->materia->get_temas_por_materia($id_materia);
			

			foreach ($materias as $materia) {
				$id 		= 	$materia['id_tema'];
				$value 		= 	$materia['nombre_tema'];
				$data[$id]	=	$value;
			}
			
		}
		
		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}
	
	
	function evaluar(){
		
		
// 		key_pregunta_1=3
// 		key_pregunta_2=6
// 		key_pregunta_5=15
		
		$eval_usuario = $this->session->userdata('evaluacion_usuario');
		
		
		$preg_selecc_with_resp = array();
		
		foreach ( $eval_usuario['preguntas_ids'] as $id )
		{
			
			$resp = array();
			$resp[] = $this->input->post('key_pregunta_' . $id);
			
			$preg_selecc_with_resp['preguntas'][$id] = $resp;
			
			
		}
		
		/* - para tipo multiple, recibo todos con el id seleccionado de cada uno 
			 
			 preg_0_resp_0=1
			 preg_0_resp_1=1
			 preg_1_resp_0=1
		
		  - para unica, recibo solo los que selecciono en el checkbox 
		  	radios_0=0
			radios_1=0
			radios_2=0
		
		*/
		
		
		//$id_materia = $this->input->post('id_materia');
		//$id_tema 	= $this->input->post('id_tema');
		
		
		
		// 1 - recuper el array de respuestas seleccionadas
		// 2 - comparar respuestas correctas con seleccionadas y calcular puntaje
		// 3 - actualizar la tabla eval_evaluaciones con el puntaje calculado
		// 4 - guardar en la tabla eval_detalle_evaluaciones 
		//		el detalle de la evaluacion (correctas y seleccionadas) 
		
		
		

		$eval_usuario['preguntas'] = $this->evaluacion_model
										->get_preguntas_respuestas($eval_usuario['preguntas_ids']);
		
		$puntaje = calcular_puntaje($eval_usuario['preguntas'], $preg_selecc_with_resp);
		
		echo "<br>puntaje: " . $puntaje * 10;
		
	}
	
	
}	
