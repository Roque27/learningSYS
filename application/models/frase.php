<?php 

class frase extends CI_Model {
	
	var $id_frase;
	var $cod_frase;
	var $texto;
	
	private $table_name = "frases";
	
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

	function save_frase($frase)
	{
		
		$this->id_frase = $frase['id_frase'];
		$this->texto = $frase['texto'];
		$this->fecha_creacion = date("Y-m-d H:i:s", now());
	
		$this->db->insert($this->table_name, $this);
	
	}
	
	function get_frase($id)
	{
		$query = $this->db->get_where($this->table_name, array('cod_frase' => $id));
	
		$row = null;
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
		}
			
		return $row;
		
	}
	
	
	function delete_frase($id){

		$this->db->where('cod_frase', $id);
		$this->db->delete($this->table_name);
	
		return ($this->db->affected_rows() > 0);
	
	}
	
	
	
}	