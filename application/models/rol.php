<?php

class Rol extends CI_Model {

    var $id_rol;
    var $nombre;
    var $descripcion;
    
    private $table_name = "usr_roles";

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function set_rol($id_rol, $nombre, $descripcion)
    {
    	$this->idRol = $id_rol;
    	$this->nombre = $nombre;
    	$this->descripcion = $descripcion;
    }
    
    function get_all_roles()
    {
    	$query = $this->db->get($this->table_name);
    		
    	return $query->result();
    }
    
    function get_rol($id_rol)
    {
    	$query = $this->db->get_where($this->table_name, array('id_rol' => $id_rol), 1, 0);
    	
    	$row = null;
    	
    	if ($query->num_rows() > 0)
    	{
    		$row = $query->row();
    	
    	}
    
    	return $row;
    }
    
    function get_recursos_rol($id_rol)
    {
    	
    	$this->db->select('*');
    	$this->db->from('usr_recursos_roles a');
    	$this->db->join('usr_recursos b', 'a.id_recurso = b.id_recurso');
    	$this->db->where('a.id_rol', $id_rol);
    	
    	$query = $this->db->get();

    	$rows = null;
    	 
    	if ($query->num_rows() > 0)
    	{
    		
    		$rows = $query->result();
    	}
    	
    	return $rows;
    }

    function save_rol($Rol)
    {	
    	$datos = array(
    			'nombre' => $Rol->nombre ,
    			'descripcion' => $Rol->descripcion 
    	);
    			
    	$this->db->insert($this->table_name, $datos);
    }

    function update_rol($Rol)
    {
    	$data = array(
    			'nombre' => $Rol->nombre,
    			'descripcion' => $Rol->descripcion
    	);
    		
    	$this->db->where('id_rol', $Rol->id_rol);
    	$this->db->update($this->table_name, $data);
    }
	
	function delete_rol($Rol)
    {  	
    	$this->db->where('id_rol', $Rol->id_rol);
    	$this->db->delete('usr_usuarios');
    		
    	$this->db->where('id_rol', $Rol->id_rol);
    	$this->db->delete('usr_recursos_roles');
    		
    	$this->db->where('id_rol', $Rol->id_rol);
    	$this->db->delete($this->table_name);
    }
}