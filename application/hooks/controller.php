<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Hooks{
	/**
	 * Hook: post_controller
	 */
	
	// add extra information to mViewData
	
	function add_viewdata(){
		
		$CI =& get_instance();
		//$ctrler = $CI->router->fetch_class();

		// render output
		//$view_data = empty($CI->mViewData) ? NULL : $CI->mViewData;
		//$CI->load->view($CI->mViewFile, $CI->mViewData);
	}
}
