<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
  }

function index(){
	$datos['titulo'] = 'Principal';
	$this->load->view('header',$datos);
    $this->load->view('principal_view');
    $this->load->view('footer');
}

function login(){
	$usuario = $this->input->post('usuario');
	$contrasenia = $this->input->post('contrasenia');

	$Usuario="";
	$idUsuario ="";

	$loginUsuario = $this->modelo->login($usuario,$contrasenia);
	$entregasPendientesHoy = $this->modelo->obtieneNumeroEntregasPendientes();


	if ($loginUsuario) {

		foreach ($loginUsuario as $valor) {
			$idUsuario = $valor->idUsuario;
			$Usuario = $valor->Usuario;
		}

		$data = array(
	        'idUsuario'  => $idUsuario,
	        'Usuario'     => $Usuario,
	        'entregasP'  =>$entregasPendientesHoy,
	        'login' => TRUE
		);
		$this->session->set_userdata($data);

		echo "logueado";
	}else{
		echo "Usario y/Contraseña incorrectos \n verifique los datos";
	}
}


function closeSession(){
	if (!$this->session->sess_destroy()) {
		echo header("Location:".base_url()."index.php/Principal");
	}
}


  //termina la clase 
}

