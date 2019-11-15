<?php
error_reporting(E_ALL ^ E_DEPRECATED);

class Elector_controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Voto_model');
	}
	
	public function index() {

        $id_user = $this->Voto_model->_userId($_SESSION['usuario']);
        $datos = $this->Voto_model->_listar($id_user);
        $votos = array( 
        	'datos' => $datos
        );
		$this->load->view('Elector/votacion_view', $votos);
    }

    public function votar($id_votacion) {
    	$id_usuario = $this->Voto_model->_userId($_SESSION['usuario']);
    	$votos = $this->Voto_model->_votosDisponibles();
    	$datos = array(
    		'id_votacion' => $id_votacion,
    		'id_usuario' => $id_usuario,
    		'votos' => $votos
    	);
    	$this->load->view('Elector/voto_view', $datos);
    }

    public function guardarVoto() {
    	$voto = $_POST['voto']; 
    	//$voto = $this->input->post('voto');

    	//usar formulario hidden=true para obtener las variables

    	//$this->Voto_model->_votar($id_usuario, $id_votacion, $voto);
    	index();
    }
}