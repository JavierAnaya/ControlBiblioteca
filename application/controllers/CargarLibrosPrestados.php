<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CargarLibrosPrestados extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

  function index(){
    $matricula = $this->input->post("matricula");
    $numero_pendientes= $this->modelo->verificaEntregasPendientes($matricula);
    if ($numero_pendientes > 0) {
          $datos['libros_suario'] =$this->modelo->optieneLibrosPrestadosAlumnos($matricula); ;
          $this->load->view('cargaLibrosPrestados_view',$datos);
    }else{
        echo "<center><h2>No tiene libros pendientes por entregar</h2></center>";
    }
    //
  }


}