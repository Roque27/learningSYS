<?php

class Contacto extends CI_Model {

    var $id_contacto;
    var $nombre;
    var $apellido;
    var $email;
    var $comentario;
    var $fecha_recibido;
    
    private $table_name = "usr_contactos";

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function set_contacto($id_contacto, $nombre, $apellido, $email, $comentario, $fecha_recibido)
    {
    		$this->id_contacto = $id_contacto;
    		$this->nombre = $nombre;
    		$this->apellido = $apellido;
    		$this->email = $email;
    		$this->comentario = $comentario;
    		$this->fecha_recibido = $fecha_recibido;
    }
    
 	function get_all_contactos()
    {
    	$query = $this->db->get($this->table_name);
    		
    	return $query->result();
    }
    
    function get_contacto($id_contacto)
    {
    	$query = $this->db->get_where($this->table_name, array('id_contacto' => $id_contacto));
    
    	return $query->result();
    }

    function save_contacto($Contacto)
    {	
    	$datos = array(
    			'nombre' => $Contacto->nombre ,
    			'apellido' => $Contacto->apellido,
    			'email' => $Contacto->email,
    			'comentario' => $Contacto->comentario,
    			'fecha_recibido' => date("Y-m-d H:i:s", now())
    	);
    			
    	$this->db->insert($this->table_name, $datos);
    }
	
	function delete_contacto($Contacto)
    {  	
    	$this->db->where('id_contacto', $Contacto->id_contacto);
    	$this->db->delete($this->table_name);
    }
}