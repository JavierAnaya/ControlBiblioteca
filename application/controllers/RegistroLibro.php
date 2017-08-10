<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegistroLibro extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

function index(){
	$datos['editar']=FALSE;
	$datos['titulo'] = 'RegistroLibro';
	$this->load->view('header',$datos);
    $this->load->view('registroLibro_view');
    $this->load->view('footer');
}

function registrar(){
	$clave = $this->input->post('clave');
	$titulo = $this->input->post('titulo');
	$autor = $this->input->post('autor');
	$editorial = $this->input->post('editorial');
	$observaciones = $this->input->post('observaciones');
	$cantidad  = $this->input->post('cantidad');
	$tipoLibro = $this->input->post('tipoLibro');
	$guardar = $this->modelo->GurdarLibro($clave,$titulo,$autor,$editorial,$observaciones,$cantidad,$tipoLibro);
	if ($guardar) {
		echo "exito";
	}else
	{
		echo "error";
	}
}

function editarLibro(){
	//echo "guardar editar libro";
	$id = $this->uri->segment(3);
	$clave = $this->input->post('clave');
	$titulo = $this->input->post('titulo');
	$autor = $this->input->post('autor');
	$editorial = $this->input->post('editorial');
	$observaciones = $this->input->post('observaciones');
	$cantidad  = $this->input->post('cantidad');
	$tipoLibro = $this->input->post('tipoLibro');
	//GuardarActualizarLibro($calve,$titulo,$autor,$editorial,$observaciones,$cantidad)
	$guardaEdit = $this->modelo->GuardarActualizarLibro($id,$titulo,$autor,$editorial,$observaciones,$cantidad,$tipoLibro);
	if ($guardaEdit) {
		echo "exito";
	}else
	{
		echo "error";
	}
	//echo $titulo;
}


}