<?php
error_reporting(E_ALL ^ E_DEPRECATED);

class Login_controller extends CI_Controller {
	//El controlador trabaja con el modelo de Usuario.
	public function __construct() {
		parent::__construct();
		$this->load->model('Usuario_model');
		$this->load->model('administracion_model');
		include $_SERVER['DOCUMENT_ROOT'] . '/votuca/classes/Usuario.php';
	}

	//Por defecto carga la vista de login.
	public function index() {
		$this->load->view('login_view');
	}

	//Función auxiliar de encriptación de contraseñas.
	public function encriptar($pass) {
		return password_hash($pass, PASSWORD_DEFAULT);
	}

	//Función de verificación de los datos introducidos en el login.
	public function verificar() {
		//include('../../classes/Usuario.php');	//Esto no funciona
		if ($this->input->post('Enviar')) {		//Si se accede mediante envío de datos y no por URL...
			$this->form_validation->set_rules('usuario', 'Nombre de usuario', 'required|trim');
			$this->form_validation->set_rules('pass', 'Contraseña', 'required|trim');
			$this->form_validation->set_message('required', 'El campo \'%s\' es obligatorio.');

			if ($this->form_validation->run() != false) {	//Si se cumplen las reglas de validación...
				$usuario = new Usuario($this->input->post('usuario'), $this->input->post('pass'));
				if ($this->Usuario_model->userExists($usuario->getId())	//Si existe el usuario y coincide la pass...
					&& password_verify($usuario->getPass(), $this->Usuario_model->getPass($usuario->getId()))) {
					$this->session->set_userdata(array('usuario' => $usuario->getId(), 'rol' => $this->Usuario_model->getRol($usuario->getId())));
					if ($this->session->userdata('rol') == 'Elector') $this->load->view('Elector/listar_votaciones');
					else{
						//$_SESSION['loggedAdmin'] = 1; // Variable que indica que se puede entrar
						$votaciones['votaciones'] = $this->administracion_model->recuperarVotaciones();
				    $datos = array(
				      'votaciones'=> $votaciones
				    );
				    $this->load->view('administracion/administracion_view',$datos);
					 };
				} else {	//Si no existe el usuario o la pass no coincide...
					$data = array('mensaje' => 'La combinación usuario/contraseña introducida no es válida.');
					$this->load->view('login_view', $data);
				}
			} else {	//Si no se cumplen las reglas de validación...
				$this->load->view('login_view');
			}
		} else $this->load->view('login_view');		//Si se accede de forma ilegal (no por envío de formulario)...
	}

	//Función para desconectarse de la web.
	public function logout() {
		if (isset($this->session->userdata('usuario'))) {	//Si estaba loggeado...
			$this->session->unset_userdata(array('usuario', 'rol'));
			$data = array('mensaje' => 'La sesión se ha cerrado con éxito.');
			$this->load->view('login_view', $data);
		} else {	//Si no...
			$this->load->view('login_view');
		}
	}
	
	//Funciones de registro
	/*
	public function registro() {
		$this->load->view('Registro_view');
	}

	public function verifica_registro() {
		if ($this->input->post('Enviar')) {
			$this->form_validation->set_rules();
			$this->form_validation->set_rules();
			$this->form_validation->set_rules();
			$this->form_validation->set_rules();
			$this->form_validation->set_rules();

			if ($this->form_validation->run() == false)
				$this->registro();
			else {
				$this->Usuario_model->Añadirusuario();
				$this->load->view('Login_view');
			}
		} else $this->load->view('Registro_view');
	}
	*/
}

?>
