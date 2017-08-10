<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegistroPersona extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

function index(){
	$datos['titulo'] = 'RegistroPersona';
	$datos['editar'] = FALSE;
	$this->load->view('header',$datos);
    $this->load->view('registroPersona_view');
    $this->load->view('footer');
}

function registrar(){
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
	$matricula = $this->input->post('matricula');
	$nombre = $this->input->post('nombre');
	$apPaterno = $this->input->post('apPaterno');
	$apMaterno = $this->input->post('apMaterno');
	$sexo = $this->input->post('sexo');
	$carrera =$this->input->post('carrera');
	$grado = $this->input->post('grado');
	$guardar=$this->modelo->GuardarPersona($matricula,$nombre,$apPaterno,$apMaterno,$sexo,$carrera,$grado);
	if ($guardar) {
		echo "exito";
	}else
	{
		echo "error";
	}
}

function editPersona(){
	$matricula = $this->uri->segment(3);
	$datosAlumno = $this->modelo->getAlumnoEdit($matricula);
	if (!is_null($datosAlumno)) {

		//extacionde los datos para la aedicion
		$matriculaAlumno =$matricula;
		$nombre ="";
		$apPaterno ="";
		$apMaterno="";
		$sexo="";
		$carrera ="";
		$grado = "";

		foreach ($datosAlumno as $dato ) {
			$nombre = $dato->Nombre;
			$apPaterno = $dato->ApPaterno;
			$apMaterno = $dato->ApMaterno;
			$sexo = $dato->Sexo;
			$carrera = $dato->Carrera;
			$grado = $dato->Grado;
		}

		//preparacion de los datos
		$datos['matricula'] = $matricula;
		$datos['nombre'] = $nombre;
		$datos['apPaterno'] = $apPaterno;
		$datos['apMaterno'] = $apMaterno;
		$datos['sexo']= $sexo;
		$datos['carrera'] = $carrera;
		$datos['grado'] = $grado;
		$datos['editar'] = TRUE;
		$datos['alumnoEdit'] = $datosAlumno;
		$datos['titulo'] = 'RegistroPersona';
		$this->load->view('header',$datos);
	    $this->load->view('registroPersona_view');
	    $this->load->view('footer');
	}else{
		echo "error";
	}
}

function guardarEditPersona(){
	$matricula = $this->input->post('matricula');
	$nombre = $this->input->post('nombre');
	$apPaterno = $this->input->post('apPaterno');
	$apMaterno = $this->input->post('apMaterno');
	$sexo = $this->input->post('sexo');
	$carrera =$this->input->post('carrera');
	$grado = $this->input->post('grado');

	  $data = array(
        'MatriculaAlumno' => $matricula,
        'Nombre' => $nombre,
        'ApPaterno' => $apPaterno,
        'ApMaterno' => $apMaterno,
        'Sexo' => $sexo,
        'Carrera' => $carrera,
        'Grado' => $grado
        );




	$actualizar = $this->modelo->saveAlumnoEdit($data,$matricula);
	if ($actualizar) {
		echo "exito";
	}else{
		echo "error";
	}
}

function deletePersona(){
	$matricula = $this->uri->segment(3); 
	$eliminar = $this->modelo->deleteAlumnoList($matricula);
	if ($eliminar) {
		echo "exito";
	}else{
		echo "error";
	}

}


}
