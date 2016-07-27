<?php

if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Publicidades extends MY_Admin_Controller {
	
	function __construct() {
		
		parent::__construct();
		
		$this->load->library('grocery_CRUD');
		
		
	}
	
	public function index() 

	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_language("spanish");
			
			
			//$crud->set_theme('datatables');
			$crud->set_table('publicidades');
			$crud->set_subject('Publicidades');
			$crud->required_fields('nombre','texto_html');
			$crud->unset_columns('password');
			
			$crud->columns('nombre','file_url','texto_html','fecha_modificacion');
			
			$crud->fields('nombre','file_url','texto_html');
			
			$crud->set_field_upload('file_url','assets/uploads/files');
			
			$output = $crud->render();
			
			$this->showViewPostLogin('admin/publicidades.php',$output);
		
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
		
		
	}
	
	/*
	
	public function get_publicidades()
	
	{
	
		// cargamos el modelo usuario
		$this->load->model('publicidad');
	
		$publicidades = $this->publicidad->get_all();
	
		$data['lista_publicidades'] = $publicidades;
	
		// mostrar vista
		$this->load->view('admin/publicidades', $data);
	
	}
	
	
	public function publicidad_edit (){
		
		// cargamos las publicidades
		$this->load->model('publicidad');
		
		
		$id = $this->input->post('id_publicidad');
		
		$pub_result = $this->publicidad->get_publicidad($id);
		
		
		$data = array('pub'=>$pub_result);
		
		$this->load->view('admin/publicidades/edit_publicidad', $data);
		
	}
	
	public function update_publicidad(){
		
		// cargamos las publicidades
		$this->load->model('publicidad');
		
		// cargamos post
		$id = $this->input->post('id_publicidad');
		$nombre = $this->input->post('nombre');
		$html_content = $this->input->post('texto_html');
		
		
		//$html_for_db = htmlentities($html_content, ENT_QUOTES, 'UTF-8');
		
		log_message("debug","Admin: update_publicidad: " . $html_content);
		
		$publicidad = array('id_publicidad'=>$id, 'nombre'=>$nombre, 'texto_html'=>$html_content);
		
		$pub_result = $this->publicidad->update_publicidad($publicidad);
		
		if ($pub_result){
			
			echo "Publicidad actualizada";
			
		}else{
			
			echo "hubo un error al actualizar el registro";
			
		}
		
	}

	
	public function delete_publicidad(){
		
		$this->load->model('publicidad');
		
		$id = $this->input->post('id_publicidad');
		
		$pub_delete_result = $this->publicidad->delete_publicidad($id);
		
		if ($pub_delete_result){
				
			echo "Publicidad actualizada";
				
		}else{
				
			echo "hubo un error al actualizar el registro";
				
		}
		
	}
	
	
	*/
	
	
}
