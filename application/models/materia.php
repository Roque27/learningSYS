<?php 

class Materia extends CI_Model {
	
	var $id_materia;
	var $nombre_materia;
	var $descripcion_materia;

	private $table_name = "eval_materias";

	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function set_materia($id_materia, $nombre, $descripcion)
	{
			$this->id_materia = $id_materia;
			$this->nombre_materia = $nombre;
			$this->descripcion_materia = $descripcion;
	}
	
	function get_all_materias()
	{
		$query = $this->db->get($this->table_name);
		
		$result = null;
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			
		}
		
		return $result;
	}
	
	
	function get_materia($id_materia){
		
		$query = $this->db->get_where($this->table_name, array('id_materia' => $id_materia), 1, 0);
		 
		$row = null;
    	
    	if ($query->num_rows() > 0)
    	{
    		$row = $query->row();
    	}
    
    	return $row;
	}
	
	function get_all_temas()
	{
		$query = $this->db->get('eval_temas');
	
		$result = null;
	
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
				
		}
	
		return $result;
	}
	
	
	function get_tema($id_tema){
	
		$query = $this->db->get_where('eval_temas', array('id_tema' => $id_tema), 1, 0);
			
		$row = null;
		 
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
		}
	
		return $row;
	}
	
	function get_temas_por_materia($id_materia){
	
		$query = $this->db->get_where('eval_temas', array('id_materia' => $id_materia));
			
		$result = null;
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
		}
	
		return $result;
	}
	
	function get_docente_por_materia($id_materia){
	
		$queryMateria = $this->db->get_where($this->table_name, array('id_materia' => $id_materia), 1, 0);
			
		$rowMateria = null;
		 
		if ($queryMateria->num_rows() > 0)
		{
			$rowMateria = $queryMateria->row();
			
			$queryDocente = $this->db->get_where('usr_usuarios', array('id_usuario' => $rowMateria->id_usuario), 1, 0);
			$rowDocente = null; 
			
			if ($queryDocente->num_rows() > 0)
			{
				$rowDocente = $queryDocente->row();
			}
		}
	
		return $rowDocente;
	}
	
} 