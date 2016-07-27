<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Admin extends MY_Admin_Controller {
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	
	public function index() 

	{
		log_message ( "debug", "Admin:index() " );
		
		// mostrar vista
		$this->showViewPostLogin('admin/index');
	
	}
	
	public function deny()
	
	{
		log_message ( "debug", "Admin:deny() " );
	
		// mostrar vista
		$this->showViewPostLogin('admin/deny_access');
	
	}
	
	
	
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */