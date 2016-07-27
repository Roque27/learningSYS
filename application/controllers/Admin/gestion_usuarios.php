<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Gestion_usuarios extends MY_Admin_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->load->library('grocery_CRUD');
		
		
	}
	
	public function index(){
		
		log_message('info',"Index");
		
	}
	
	public function usuarios() 
	{
		
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");
			
			//$crud->set_theme('datatables');
			
			$crud->fields('nombre_usuario','password','nombre', 'apellido', 'nro_documento','mail','id_rol');
			
			$crud->set_table('usr_usuarios');
			$crud->set_subject('Usuarios');
			$crud->set_relation('id_rol','usr_roles','nombre');
			$crud->display_as('id_rol','Rol');
			$crud->display_as('password','Contraseña');
						
			$crud->unset_columns('password');
			$crud->unset_read_fields('password');
			$crud->unset_edit_fields('password');
			
			$crud->change_field_type('password','password');
			
			$crud->callback_before_insert(array($this, 'callback_before_create_user'));
			
			$output = $crud->render();
			
			$this->showViewPostLogin('admin/gestion_usuarios_view.php',$output);
		
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	}
	
	
	/**
	 * Grocery Crud callback functions
	 */
	
	public function callback_before_create_user($post_array)
	{
		$post_array['password'] = encrypt_pwd($post_array['password']);
		return $post_array;
	}
	
	
	public function roles()
	{
	
		try{
			$crud = new grocery_CRUD();
				
			$crud->set_language("spanish");
				
			//$crud->set_theme('datatables');
				
			$crud->set_table('usr_roles');
			$crud->set_subject('Roles');
			
			$crud->set_relation_n_n('recursos', 'usr_recursos_roles', 'usr_recursos', 'id_rol', 'id_recurso', 'nombre_recurso');
			
			$crud->unset_columns('password');
			$crud->unset_read_fields('password');
			$crud->unset_edit_fields('password');
				
				
			$output = $crud->render();
				
			$this->showViewPostLogin('admin/gestion_usuarios_view.php',$output);
	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	
	}
	
	
	public function recursos()
	{
	
		try{
			$crud = new grocery_CRUD();
	
			// language
			$crud->set_language("spanish");
			
			// table
			$crud->set_table('usr_recursos');
			
			// nombre
			$crud->set_subject('Recursos');
			
			$output = $crud->render();
	
			$this->showViewPostLogin('admin/gestion_usuarios_view.php',$output);
	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	
	}
	
	
}
