<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Interesados extends MY_Admin_Controller {
	
	function __construct() {
		
		parent::__construct();
	
		$this->load->library('grocery_CRUD');
		
		
		$this->load->helper('date');
		
	}
	
	
	
	public function index() 

	{
		log_message ( "debug", "Interesados:index() " );
		
		
		try{
			$crud = new grocery_CRUD();
			$crud->set_language("spanish");
				
				
			//$crud->set_theme('datatables');
			$crud->set_table('interesados');
			$crud->set_subject('Interesados');
			$crud->required_fields('nombre','apellido','email','comentario');
			$crud->columns('nombre','apellido','email','comentario','fecha_recibido');
			$crud->fields('nombre','apellido','email','comentario','fecha_recibido');
				
			$crud->field_type('fecha_recibido','invisible');
			
			$crud->unset_delete();
			$crud->unset_add();
			$crud->unset_edit();
			
			$crud->callback_before_update(array($this,'_set_date_callback'));
			
			$output = $crud->render();
				
			$this->showViewPostLogin('admin/interesados',$output);
		
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	
	}
	
	
	function _set_date_callback($post_array, $primary_key){
		
		$post_array['fecha_recibido'] = date("Y-m-d H:i:s", now());

		return $post_array;
		
	}
	
	
	
	
	
	
	
	
}	