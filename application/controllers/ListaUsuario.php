<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListaUsuario extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

  function index(){
  	$datos['usu_bibioteca'] = $this->modelo->ObtinenUsuariosBiblioteca();
	$datos['titulo'] = 'ListadoUsuarios';
	$this->load->view('header',$datos);
    $this->load->view('listaUsuarios_view',$datos);
    $this->load->view('footer');
  }

}