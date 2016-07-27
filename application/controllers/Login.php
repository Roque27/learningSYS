<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	
	function __construct() {
		parent::__construct();
		
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		
		// cargamos el modelo usuario
		$this->load->model('UsuarioHistorico');
		
		// cargamos el modelo usuario
		$this->load->model('Usuario');
		
	}
	
	
	public function index(){
		
		log_message("debug","Login:index() ");

		// verificamos si el usuario no esta logueado
		if( $this->session->userdata('isLoggedIn') ) {
				
			redirect('/Admin');
		}
		
		//views 
		$this->showView('login');
		
	}
	
	
	public function access(){
		
		log_message("debug","Login: access()");
		
		// verificamos si el usuario no esta logueado
		if( $this->session->userdata('isLoggedIn') ) {
			redirect('/Admin');
		}

		$username = $this->input->post('username');
        $password = encrypt_pwd($this->input->post('password'));
        
		// pedimos al modelo que consulte el usuario
		$user = $this->Usuario->get_user($username, $password);
		
		// validar password
		if ($user != null) {
			
			$user_data = array( 'isLoggedIn'		=> 	TRUE,
					 		    'username'			=> 	$username,
								'id_usuario'		=> 	$user->id_usuario,
								'nombre' 			=>	$user->nombre,
								'apellido' 			=> 	$user->apellido,
								'nro_documento' 	=> 	$user->nro_documento,
								'mail' 				=> 	$user->mail,
								'password' 			=> 	$user->password,
								'id_rol' 			=> 	$user->id_rol,
								'nombre_rol' 		=> 	$user->nombre_rol,
								'lista_recursos' 	=> 	$user->recursos_rol
					
							);
			
			$this->session->set_userdata($user_data);
			
			
			// registramos el usuario en la tabla de historicos
			
			// insertamos
			$this->UsuarioHistorico->save_usuario_historico($user);
			
			// login exitoso
			
			if (MY_Controller::isRolAlumno()){
				
				redirect('/Alumnos');
				
			}else {
				
				redirect('/Admin');
				
			}
			
		
		}else {
			
			// seteamos que hay un error 
			$data['error'] = TRUE;
			
			//cargamos la vista 
			$this->showView('login', $data);
			
		}
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */