<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EntregaLibro extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

  function index(){
    $datos['usu_deudores'] = $this->modelo->optieneUsuariosDeudores();
    $this->load->view('entregaLibro_view',$datos);
  }

  function MustraLibrosAlumno(){
    $matricula = $this->input->post('matricula');
    $usuariosDeudores =$this->modelo->mostrarLibrosUsuario($matricula);
    if (count($usuariosDeudores)>0) {
      $datos['usu_deudores'] = $usuariosDeudores ;
      $this->load->view('entregaLibro_view',$datos);
    }
    
  }

  function EntregaLibroUsuario(){
    $identificador = $this->uri->segment(3);
    $fecha = date("Y-m-d");
    $registrar = $this->modelo->registrarEntrega($identificador,$fecha);
    if ($registrar) {
      echo "exito";
    }else
    {
        echo "errors";
    }
    
  }
}