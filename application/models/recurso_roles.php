<?php

class RecursoRol extends CI_Model {

    var $id_recurso;
    var $nombre_recurso;
    var $descripcion_recurso;
    var $id_rol;
    var $alta;
    var $baja;
    var $modificacion;
    var $consulta;
    
    private $table_name = "usr_recursos_roles";

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function set_recurso_rol($id_recurso, $nombre_recurso, $descripcion_recurso, $id_rol, $alta, $baja, $modificacion, $consulta)
    {
    	try {
    		$this->id_recurso = $id_recurso;
    		$this->nombre_recurso = $nombre_recurso;
    		$this->descripcion_recurso = $descripcion_recurso;
    		$this->id_rol = $id_rol;
    		$this->alta = $alta;
    		$this->baja = $baja;
    		$this->modificacion = $modificacion;
    		$this->consulta = $consulta;
    	}
    	catch (Exception $e) {
    		log_message("RecursoRol_set_recurso_rol","exception " . $e);
    	}
    }
    
    function get_all_recursos_rol()
    {
    	try {
    		$query = $this->db->get($this->table_name);
    		
    		return $query->result();
    	}
    	catch (Exception $e) {
    		log_message("RecursosRol_get_all_recursos_rol","exception " . $e);
    	}
    }
    
    function get_recurso_por_rol($id_recurso, $id_rol)
    {
    	try {
    		$query = $this->db->get_where($this->table_name, array('id_recurso' => $id_recurso, 'id_rol' => $id_rol));
    
    		return $query->result();
    	}
    	catch (Exception $e) {
    		log_message("RecursoRol_get_recurso_rol","exception " . $e);
    	}
    }

    function save_recurso_rol($RecursoRol)
    {	
    	try {
    			$datos = array(
    					'nombre_recurso' => $RecursoRol->nombre_recurso ,
    					'descripcion_recurso' => $RecursoRol->descripcion_recurso,
    					'id_rol' => $RecursoRol->id_rol,
    					'alta' => $RecursoRol->alta,
    					'baja' => $RecursoRol->baja,
    					'modificacion' => $RecursoRol->modificacion,
    					'consulta' => $RecursoRol->consulta
    			);
    			
    		$this->db->insert($this->table_name, $datos);
        }
        catch (Exception $e) { 
        	log_message("RecursoRol_save_recurso_rol","exception " . $e);
        }
    }

    function update_recursos_rol($RecursoRol)
    {
    	try {
    		$datos = array(
    				'nombre_recurso' => $RecursoRol->nombre_recurso ,
    				'descripcion_recurso' => $RecursoRol->descripcion_recurso,
    				'id_rol' => $RecursoRol->id_rol,
    				'alta' => $RecursoRol->alta,
    				'baja' => $RecursoRol->baja,
    				'modificacion' => $RecursoRol->modificacion,
    				'consulta' => $RecursoRol->consulta
    		);
    		
    		$this->db->where('id_recurso', $RecursoRol->id_recurso);
    		$this->db->update($this->table_name, $datos);
    	}
    	catch (Exception $e) {
    		log_message("RecursoRol_update_recurso_rol","exception " . $e);
    	}
    }
	
	function delete_recursos_rol($RecursoRol)
    {
    	try {    	
    		$this->db->where('id_recurso', $RecursoRol->id_recurso);
    		$this->db->where('id_rol', $RecursoRol->id_rol);
    		$this->db->delete($this->table_name);
    	}
    	catch (Exception $e) {
    		log_message("RecursoRol_delete_recurso_rol","exception " . $e);	
    	}
    }
}