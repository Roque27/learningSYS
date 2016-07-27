<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nosotros extends MY_Controller {

	
	function __construct() {
	
		parent::__construct();
		
		// helper url
		$this->load->helper('url');
	}
	
	
	public function index()
	{
		
		log_message("debug","Index Init");
		
		//views 
		$this->showView('nosotros');

		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */