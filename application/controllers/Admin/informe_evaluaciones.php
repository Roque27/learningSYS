<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Informe_evaluaciones extends MY_Admin_Controller {

	function __construct() {

		parent::__construct();
		
		$this->load->model('materia');
		$this->load->model('usuario');
		

		$this->load->library('grocery_CRUD');

	}
	
	public function informe()
	{
	
		try{
			$crud = new grocery_CRUD();
				
			$crud->set_language("spanish");
				
			$crud->unset_edit();
			$crud->unset_delete();
			
			$crud->set_table('eval_evaluaciones');
			$crud->set_subject('Lista de examenes');
				
			//$crud->
			
			$crud->columns('id_evaluacion', 'fecha_creacion', 'id_usuario', 'id_docente', 'id_materia', 'puntaje', 'dni', 'email');
			$crud->fields('id_evaluacion', 'fecha_creacion', 'id_usuario', 'id_docente', 'id_materia', 'puntaje', 'dni', 'email');
			
			$crud->set_relation('id_usuario','usr_usuarios', '{apellido}, {nombre}');
			$crud->set_relation('id_materia','eval_materias','nombre_materia');
	
			$crud->callback_column('id_docente',array($this,'callback_obtener_docente'));
			$crud->callback_column('dni',array($this,'callback_obtener_dni'));
			$crud->callback_column('email',array($this,'callback_obtener_email'));
			
			$output = $crud->render();
				
			$this->showViewPostLogin('admin/informe_evaluaciones_view.php',$output);
	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	
	}
	
	
	function callback_obtener_docente($value, $row)
	{
		//echo "<pre>";
		//print_r($row);
		//echo "</pre>";
		
		$usuario_docente = $this->materia->get_docente_por_materia($row->id_materia);
		
		return $usuario_docente->apellido. ', '. $usuario_docente->nombre;
	}
	
	function callback_obtener_dni($value, $row)
	{
		$usuario_alumno = $this->usuario->get_usuario_por_id($row->id_usuario);
	
		return $usuario_alumno->nro_documento;
	}
	
	function callback_obtener_email($value, $row)
	{
		$usuario_alumno = $this->usuario->get_usuario_por_id($row->id_usuario);
	
		return $usuario_alumno->mail;
	}

}