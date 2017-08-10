<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PrestamoLibro extends CI_Controller {
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
  	$datos['titulo'] = 'PrestamoLibro';
  	$this->load->view('header',$datos);
    $this->load->view('prestamoLibro_view',$datos);
    $this->load->view('footer');
  }

  function CargarAlumno(){
    $matricula = $this->input->post("matricula");
    $datos = $this->modelo->buscarAlumnoPorMatricula($matricula);
    if ($datos) {
      echo json_encode($datos);
    }else{
      echo "error";
    }
  }

  function CargarLibro(){
    $clave = $this->input->post("clave");
    $datos = $this->modelo->buscarLibroPorClave($clave);
    if ($datos) {
      echo json_encode($datos);
    }else{
      echo "error";
    }
  }

  function PrestarLibro(){
    $datos = $_POST;
    $matricula = $this->input->post("matricula");
    $clave = $this->input->post("clave");
    $fechaEntrega ="" ;
    $opcion = $this->input->post("opciones");
    $fechaLimite = $this->input->post("fechaEntrega");
    $Fecha = date("Y-m-d");
    
    $libros_prestadosAlumno=$this->modelo->verificaEntregasPendientes($matricula);
    $libro_igual = $this->modelo->buscaLibrosIguales($matricula,$clave);

    if ($libros_prestadosAlumno<3 && $libro_igual ==0) {
      $data = array(
          'MatriculaAlumno' => $matricula,
          'ClaveLibro' => $clave,
          'FechaPrestamo' => $Fecha,
          'FechaEntrega' => $fechaEntrega,
          'FechaLimiteEntrega' =>$fechaLimite,
          'TipoPrestamo' => $opcion
      );

      $inserta = $this->modelo->registrarPrestamoLibro($data);
      if ($inserta) {
        echo "exito";
      }else
      {
        echo "error";
      }
    }else {
      echo "nopuede";
    }


    //echo json_encode($datos);
  }


}
