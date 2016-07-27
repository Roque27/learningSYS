<?php 

class publicidad extends CI_Model {
	
	var $id_publicidad;
	var $nombre;
	var $texto_html;
	var $fecha_creacion;
	var $fecha_modificacion;
	
	private $table_name = "publicidades";

	
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

	function save_publicidad($publicidad)
	{
		
		$this->id_publicidad = $publicidad['id_publicidad'];
		$this->texto_html = $publicidad['texto_html'];
		$this->fecha_creacion = date("Y-m-d H:i:s", now());
	
		$this->db->insert($this->table_name, $this);
	
	}
	
	function get_publicidad($id)
	{
		$query = $this->db->get_where($this->table_name, array('id_publicidad' => $id));
	
		$row = null;
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
		}
			
		return $row;
		
	}
	
	function update_publicidad($publicidad){
		
		log_message("debug",$publicidad['texto_html']);
		
		$data = array('nombre'=>$publicidad['nombre'],
					  'texto_html'=>$publicidad['texto_html'],
					  'fecha_modificacion'=> date("Y-m-d H:i:s", now()));
		
		$this->db->where('id_publicidad',$publicidad['id_publicidad']);
		$this->db->update($this->table_name, $data);
		
		
		return ($this->db->affected_rows() > 0);
	
	}
	
	function delete_publicidad($id){

		$this->db->where('id_publicidad', $id);
		$this->db->delete($this->table_name);
	
		return ($this->db->affected_rows() > 0);
	
	}
	
	
	
}	