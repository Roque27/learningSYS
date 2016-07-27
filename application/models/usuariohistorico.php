<?php 

class UsuarioHistorico extends CI_Model {
	
	var $id_hist_usuario;
	var $id_usuario;
	var $nombre_usuario;
	var $date_login;
	var $date_logout;
	
	private $table_name = "usr_historico_usuarios";
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		
		$this->load->helper('date');
	}
	
	function get_all_Usuarios_historicos()
	{
		$query = $this->db->get($this->table_name);
		
		return $query->result();
	}
	
	function get_usuario_historico($Usuario)
	{
		$query = $this->db->get_where($this->table_name, array('id_usuario' => $Usuario->idUsuario));

		return $query->result();
	}
	
	function save_usuario_historico($Usuario)
	{
		$datos = array(
				'id_usuario' => $Usuario->id_usuario,
				'nombre_usuario' => $Usuario->nombre_usuario,
				'date_login' => date("Y-m-d H:i:s", now())
		);
		$this->db->insert($this->table_name, $datos);
		
	}
	
	function registrar_logout($id_usuario)
	{
		$data = array('date_logout'=> date("Y-m-d H:i:s", now()));	
	
		$this->db->update($this->table_name, $data);
		$this->db->where('id_usuario',$id_usuario);
		
		
	
	}
} 