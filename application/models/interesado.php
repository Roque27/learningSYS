<?php 

class interesado extends CI_Model {
	
	var $id_interesado;
	var $nombre;
	var $apellido;
	var $email;
	var $comentario;
	var $fecha_recibido;
	
	private $table_name = "interesados";

	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		
		$this->load->helper('date');
	}
	
	function get_all()
	{
		$query = $this->db->get($this->table_name);
	
		return $query->result();
	}

	function save($interesado)
	{
		
		$this->nombre = $interesado['nombre'];
		$this->apellido = $interesado['apellido'];
		$this->email = $interesado['email'];
		$this->comentario = $interesado['comentario'];
		
		$this->fecha_recibido = date("Y-m-d H:i:s", now());
	
		$this->db->insert($this->table_name, $this);
	
	}
	
}
	
	
	
	
	
	
	
	
	
	
	
	