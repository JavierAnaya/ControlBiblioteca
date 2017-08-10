<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

  function index(){
  	$datos['titulo'] = 'Estadisticas';
  	$this->load->view('header',$datos);
    $this->load->view('estadisticas_view');
    $this->load->view('footer');
  }

  function obtieneDatosPorSexo(){


    $fechaInicio = $this->input->post("fechaIni");//'2017-01-31';
    $fechaFin=$this->input->post("fechaFi");//'2017-02-02';


    $numeroHombres = $this->modelo->obtieneDatosPorSexoHombre($fechaInicio,$fechaFin);
    $numeroMujeres = $this->modelo->obtieneDatosPorSexoMujer($fechaInicio,$fechaFin);

    if (!is_null($numeroHombres) && !is_null($numeroMujeres)) {
        $datos =array('hombres' => $numeroHombres,'mujeres'=>$numeroMujeres );
        echo json_encode($datos);
    }else
    {
      echo "error";
    }
   

  }

  function obtieneDatosPorGrado(){
    $fechaInicio = $this->input->post("fechaIni");//'2017-01-31';
    $fechaFin=$this->input->post("fechaFi");//'2017-02-02';

    $primerGrado =$this->modelo->obtieneDatosPrestamoPrimerGrado($fechaInicio,$fechaFin);
    $segundoGrado =$this->modelo->obtieneDatosPrestamoSegundoGrado($fechaInicio,$fechaFin);
    $tercerGrado=$this->modelo->obtieneDatosPrestamoTerceroGrado($fechaInicio,$fechaFin);
    
    if (!is_null($primerGrado) && !is_null($segundoGrado) && !is_null($tercerGrado)) {
      $datos = array('primero' =>$primerGrado ,'segundo'=>$segundoGrado,'tercero'=>$tercerGrado);
      echo json_encode($datos);
    }else{
      echo "error";
    }


  }


  function obtieneDatosPorCarrera(){
    $fechaInicio = $this->input->post("fechaIni");//'2017-01-31';
    $fechaFin=$this->input->post("fechaFi");//'2017-02-02';

    $informatica =$this->modelo->obtieneDatosPrestamoCarreraInformatica($fechaInicio,$fechaFin);
    $diseno=$this->modelo->obtieneDatosPrestamoCarreraDiseno($fechaInicio,$fechaFin);;

    if (!is_null($informatica) && !is_null($diseno)) {
      $datos =  array('informatica' =>$informatica ,'diseno'=>$diseno);
      echo json_encode($datos);
    }else{
      echo "error";
    }
  }



}
