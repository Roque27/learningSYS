<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Deny extends MY_Admin_Controller {
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	
	public function index() 

	{
		log_message ( "debug", "Admin:index() " );
		
		// mostrar vista
		$this->showViewPostLogin('admin/deny_access');
	
	}
	
	
}
