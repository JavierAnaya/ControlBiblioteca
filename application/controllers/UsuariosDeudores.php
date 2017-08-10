<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsuariosDeudores extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

  function index(){
  	$datos['titulo'] = 'UsuariosDeudores';
  	$this->load->view('header',$datos);
    $this->load->view('usuariosDeudores_view');
    $this->load->view('footer');
  }
}