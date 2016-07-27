<?php 

class evaluacion_model extends CI_Model {
	
	
	private $table_preguntas = "eval_preguntas";
	private $table_respuestas = "eval_respuestas";
	private $table_evaluaciones = "eval_evaluaciones";

	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->helper('date');
		
	}
	
	
	function get_respuestas_por_pregunta($id_pregunta){
		
		$query = $this->db->get_where($this->table_respuestas, array('id_pregunta' => $id_pregunta));
			
		return $query->result_array();
		
	}
	
	function insert_pregunta_respuestas($pregunta, $respuestas) {
		
		// init transaction
		$this->db->trans_start();
		
		// insert preguntas
		$this->db->insert($this->table_preguntas, $pregunta);
		$last_id = $this->db->insert_id();
		
		// insert respuestas
		$this->insert_respuestas($last_id, $respuestas);
		
		
		// end transaction
		$this->db->trans_complete();
	
	}
	
	function insert_respuestas($id_preg, $respuestas) {
		
		foreach ($respuestas as $resp) {
			
			$resp['id_pregunta'] = $id_preg;
			
			$this->db->insert($this->table_respuestas, $resp);
			
		}
	
	}
	
	
	
	
	
	function generar_evaluacion($id_materia, $id_tema, $limit=2){
		
		$res = null;
		
		$sql = "select id_pregunta from eval_preguntas where id_tema = ". $id_tema ." order by rand() limit ". $limit;
		
    	$query = $this->db->query($sql);
    	
    	if ($query->num_rows() > 0)
    	{
    		$res = $query->result_array();
    	}
    	
		return $res;
		
	}
	
	
	function get_preguntas_respuestas($preguntas_ids)
	{
		
		$preg_resp_data = array();
		
		$this->db->where_in('id_pregunta', $preguntas_ids);
		$this->db->order_by("id_pregunta", "asc");
		$query = $this->db->get($this->table_preguntas);
		
		if ($query->num_rows() > 0)
		{
			// por cada pregunta
			$id = 0;
			foreach ($query->result_array() as $row)
			{
				$preg_resp_data[$id] = $row;
				 
				// traigo respuestas
				$preg_resp_data[$id]['respuestas'] = $this->get_respuestas_por_pregunta($row['id_pregunta']);
				 
				$id++;
				 
			}
		}
		
		return $preg_resp_data;
		
	}
	
	
	function inserta_evaluacion($id_materia, $id_tema, $id_usuario )
	{
		
		$data = array(
					'id_materia'		=>	$id_materia,
					'id_usuario'		=>	$id_usuario,
					'id_tema'			=>	$id_materia,
					'fecha_creacion' 	=>  date("Y-m-d H:i:s", now())
		);
		
		// insert eval_evaluacion
		$this->db->insert($this->table_evaluaciones, $data);
		
		return $this->db->insert_id();
		
	}
	
	// se usa cuando el alumno terminó el examen
	function insert_detalle_evaluacion($id_evaluacion, $id_tema, $id_usuario )
	{
	
		$data = array(
				'id_materia'		=>	$id_materia,
				'id_usuario'		=>	$id_usuario,
				'id_tema'			=>	$id_materia,
				'fecha_creacion' 	=>  date("Y-m-d H:i:s", now())
		);
	
		// insert eval_evaluacion
		$this->db->insert($this->table_evaluaciones, $data);
	
		return $this->db->insert_id();
	
	}
	
}
	
	
	
	
	
	
	
	
	
	
	
	