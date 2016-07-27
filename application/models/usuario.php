<?php 

class Usuario extends CI_Model {
	
	var $id_usuario;
	var $nombre_usuario;
	var $nombre;
	var $apellido;
	var $nro_documento;
	var $mail;
	var $password;
	var $id_rol;
	var $nombre_rol;
	var $recursos_rol;
	
	private $table_name = "usr_usuarios";

	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function set_usuario($id_usuario, $nombre_usuario, $nombre, $apellido, $nro_documento, $mail, $password, $id_rol, $nombre_rol, $recursos_rol)
	{
			$this->id_usuario = $id_usuario;
			$this->nombre_usuario = $nombre_usuario;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->nro_documento = $nro_documento;
			$this->mail = $mail;
			$this->password = $password;
			$this->id_rol = $id_rol;
			$this->nombre_rol = $nombre_rol;
			$this->recursos_rol = $recursos_rol;
	}
	
	function get_all_Usuarios()
	{
		$query = $this->db->get($this->table_name);
		
		return $query->result();
	}
	
	
	function get_user($nombre_usuario, $password){
		
		$query = $this->db->get_where($this->table_name, array('nombre_usuario' => $nombre_usuario, 'password' => $password), 1, 0);
		 
		$row = null;

		 
		if ($query->num_rows() > 0)
		{
		 	
			$row = $query->row();
		 	
		 	$this->load->model('Rol');
		 	
		 	$rol_usuario = $this->Rol->get_rol($row->id_rol);	 	
		 	
		 	$nombre_rol = null;
		 	
		 	if (isset($rol_usuario)){
		 		$nombre_rol = $rol_usuario->nombre;
		 	}
		 	
		 	$recursos_rol = $this->Rol->get_recursos_rol($row->id_rol);
		 	
		 	$user = new Usuario();
		 	$user->set_usuario( $row->id_usuario, 
		 						$row->nombre_usuario, 
		 						$row->nombre, 
		 						$row->apellido, 
		 						$row->nro_documento, 
		 						$row->mail, 
		 						$row->password, 
		 						$row->id_rol, 
		 						$nombre_rol, 
		 						$recursos_rol);
		 }
		 
		 return $user;	
	}
	
	function get_usuario_por_id($id_usuario)
	{
		$query = $this->db->get_where($this->table_name, array('id_usuario' => $id_usuario), 1, 0);
		 
		$row = null;
		 
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			 
		}
	
		return $row;
	}
	
	
	function save_usuario($Usuario)
	{
		try {
			$datos = array(
					'password' => $Usuario->password ,
					'nombre_usuario' => $Usuario->nombre_usuario ,
					'nombre' => $Usuario->nombre ,
					'apellido' => $Usuario->apellido ,
					'nro_documento' => $Usuario->nro_documento ,
					'mail' => $Usuario->mail ,
					'id_rol' => $Usuario->id_rol
			);
			$this->db->insert($this->table_name, $datos);
		}
		catch (Exception $e) {
			log_message("Rol_save_usuario","exception " . $e);
		}
	}
	
	function update_usuario($Usuario)
	{
		try {
			$datos = array(
					'password' => $Usuario->password ,
					'nombre_usuario' => $Usuario->nombre_usuario ,
					'nombre' => $Usuario->nombre ,
					'apellido' => $Usuario->apellido ,
					'nro_documento' => $Usuario->nro_documento ,
					'mail' => $Usuario->mail ,
					'id_rol' => $Usuario->id_rol
			);
	
			$this->db->where('id_usuario', $Usuario->id_usuario);
			$this->db->update($this->table_name, $datos);
		}
		catch (Exception $e) {
			log_message("Rol_update_usuario","exception " . $e);
		}
	}
	
	function delete_usuario($Usuario)
    {   
    	$this->db->where('id_usuario', $Usuario->id_usuario);
    	$this->db->delete('USR_HISTORICO_USUARIOS');
    	
    	$this->db->where('id_usuario', $Usuario->id_usuario);
    	$this->db->delete($this->table_name);
    }	
} 