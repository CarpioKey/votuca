<?php

include 'classes/Administrador.php';

class Administrador_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Usuario_model');
        $this->load->helper('date');
	}

	public function index() {
		switch ($this->session->userdata('rol')) {
			case 'Administrador':
				$this->load->view('administracion/administracion_view');
				break;
			case 'Elector':
				redirect('Elector_controller');
				break;
			case 'Secretario':
				redirect('Secretario');
				break;
			case 'Secretario delegado':
				redirect('Secretario_delegado');
				break;
			default:
				$this->load->view('login_view');
				break;
		}
	}
	
	private function logs() {
		$datename = mdate("%Y%m%d");
		$file = fopen($_SERVER['DOCUMENT_ROOT'] . '/votuca/application/logs/' . $this->datename, "r");
		return $file;
	}
	
	public function monitoring() {
		$file = $this->logs();
		$logarray = array();
		if ($this->input->post('Filtrar')) {
			$login = $this->input->post('cLogin');
			$logout = $this->input->post('cLogout');
			$vote = $this->input->post('cVote');
			$included = false;
			while (($line = fgets($file)) !== false) {
				if ($login === true && strpos($line, '[LOGIN]') !== false) {
					array_push($logarray, $line);
					$included = true;
				}
				if ($included == false && $logout === true && strpos($line, '[LOGOUT]') !== false) {
					array_push($logarray, $line);
					$included = true;
				}
				if ($included == false && $vote === true && strpos($line, '[VOTE]') !== false) {
					array_push($logarray, $line);
					$included = true;
				}
				$included = false;
			}
		} else
			while (($line = fgets($file)) !== false)
				array_push($logarray, $line);
		$this->load->view('administracion/administracionMonitoring_view', $logarray);
	}
	
	public function buscador() {
		if ($this->input->post('Buscar')) {
			$usuario = $this->input->post('usuario');
			if ($this->Usuario_model->userExists($usuario)) {
				$data = array(
					'usuario' => $usuario,
					'rol' => $this->Usuario_model->getRol($usuario)
				);
			} else {
				$data = array('mensaje' => 'No hay ningún usuario con ese identificador.');
			}
			$this->load->view('administracion/administracion_view', $data);
		}
	}
	
	public function nuevoRol() {
		if ($this->input->post('checkBoxInput')) {
			$usuario = $this->input->post('usuario');
			$oldrol = $this->Usuario_model->getRol($usuario);
			$newrol = $this->input->post('checkBoxInput');
			$this->Usuario_model->setRol($usuario, $newrol);
			$data = array('mensaje_success' => 'Se ha actualizado el rol de ' . $usuario . ', que pasa de ser ' . $oldrol . ' a ser ' . $newrol . '.');
			$this->load->view('administracion/administracion_view', $data);
		}
	}
}

?>