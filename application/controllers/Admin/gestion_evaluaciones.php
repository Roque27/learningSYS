<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Gestion_evaluaciones extends MY_Admin_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->load->library('grocery_CRUD');
		
		// cargamos el modelo usuario
		$this->load->model('evaluacion_model');
		
		// cargamos el modelo materias
		$this->load->model('materia');
		
		
	}
	
	public function materias() 
	{
		
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			
			$crud->set_table('eval_materias');
			$crud->set_subject('Materias');
			
			
			$crud->fields('nombre_materia','descripcion_materia','id_usuario');
			
			$crud->change_field_type('id_usuario','invisible');
			
			$crud->callback_before_insert(array($this,'before_insert_materia_callback'));
			
			$output = $crud->render();
			
			$this->showViewPostLogin('admin/gestion_evaluaciones_view.php',$output);
		
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	}
	
	public function temas()
	{
	
		try{
			$crud = new grocery_CRUD();
				
			$crud->set_language("spanish");
	
			//$crud->set_theme('datatables');
				
			$crud->set_table('eval_temas');
			$crud->set_subject('Temas');
				
			$crud->set_relation('id_materia','eval_materias','nombre_materia');
			
			$crud->display_as('id_materia','Materia');
			
			//$crud->callback_field('pregunta',array($this,'callback_pregunta'));
				
			$output = $crud->render();
				
			$this->showViewPostLogin('admin/gestion_evaluaciones_view.php',$output);
	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	
	}
	
	public function preguntas()
	{
	
		try{
			$crud = new grocery_CRUD();
	
			$crud->set_language("spanish");
	
			//$crud->set_theme('datatables');
	
			$crud->unset_edit();
			
			$crud->set_table('eval_preguntas');
			$crud->set_subject('Preguntas');

			$crud->fields('materia','id_tema','id_tipo_evaluacion','pregunta','respuesta');
			
			// relacionamos tema
			$crud->set_relation('id_tema','eval_temas','nombre_tema');
			$crud->set_relation('id_tipo_evaluacion','eval_tipos_evaluacion','tipo_evaluacion');
			
			//$crud->set_relation_n_n('id_materia', 'eval_temas', 'eval_materias', 'id_materia', 'id_materia', 'nombre_materia');
			
			// cargamos combo de materias
			$crud->field_type('materia','dropdown', $this->getMaterias());
			
			$crud->field_type('respuesta','text');
			
			$crud->callback_field('respuesta',array($this,'callback_respuesta'));
			
			$crud->display_as('id_tema','Tema');
			$crud->display_as('id_tipo_evaluacion','tipo_evaluacion');
			
			$crud->callback_insert(array($this,'insert_pregunta_callback'));
			
	
			$output = $crud->render();
	
			$this->showViewPostLogin('admin/gestion_evaluaciones_view.php',$output);
	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	
	}
	
	function insert_pregunta_callback ($post_array){
		
		$respuestas_data = array();
		
		$key_resp = "respuesta_1";
		$key_es_correcta = "es_correcta_1";
		
		$i = 1;
		
		while (isset($post_array[$key_resp])){
			
			$respuestas_data[$i] = array('respuesta'=>$post_array[$key_resp], 'es_correcta'=>'N');
			
			if (isset($post_array[$key_es_correcta]) &&  $post_array[$key_es_correcta] == 's' ) {
				
				print ("pongo s");
				$respuestas_data[$i]['es_correcta'] = 'S';
			}
			
			$i++;
			$key_resp = "respuesta_" . $i;
			$key_es_correcta = "es_correcta_" . $i;
			
			
			
		}
		
		if ($post_array['id_tipo_evaluacion'] == 1){
			
			$id_correcta = $post_array['es_correcta'];

			// radio
			$respuestas_data[$id_correcta]['es_correcta'] = 'S';
			
		}
		
		$pregunta = array('id_tema'				=>	$post_array['id_tema'],
						  'pregunta'			=>	$post_array['pregunta'],
						  'id_tipo_evaluacion'	=>	$post_array['id_tipo_evaluacion']		
		);
		
		
		// inserto la pregunta y sus respuestas
		$this->evaluacion_model->insert_pregunta_respuestas($pregunta, $respuestas_data);
    	
		return true;
		
		
	}
	
	
	function before_insert_materia_callback($post_array){
		
		
		
		$post_array['id_usuario'] = 1;
		
		return $post_array;
		
		
	}
	
	
	
	function callback_respuesta(){
		
 		$output = "";
		$output = $this->load->view('admin/evaluaciones/insert_page_preguntas_view', '', true);
		return $output;
		
	}
	
	
	function getMaterias(){
		
		$data_records = $this->materia->get_all_Materias();
		
 		$materias_combo = array();
		
		foreach ($data_records as $data){
			$materias_combo[$data->id_materia] = $data->nombre_materia;
		}
		
		return $materias_combo;
		
	}
	
	
	
}
