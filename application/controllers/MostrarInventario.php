<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MostrarInventario extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }

function index(){
//consiguracion de paginate
    $this->load->helper('url');
    /* Se cargan el modelo alumno y la libreria pagination */
    $this->load->library('pagination');
    /* URL a la que se desea agregar la paginación*/
    $config['base_url'] = base_url().'mostrarInventario/pagina/';
    /*Obtiene el total de registros a paginar */
    $config['total_rows'] = $this->modelo->getTotalLibrosALL();
       /*Obtiene el numero de registros a mostrar por pagina */
    $config['per_page'] = '10';
    /*Indica que segmento de la URL tiene la paginación, por default es 3*/
    $config['uri_segment'] = '3';


//termina configuracion de paginate
/*Se personaliza la paginación para que se adapte a bootstrap*/
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['last_link'] = FALSE;
    $config['first_link'] = FALSE;
    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';



    /* Se inicializa la paginacion*/
    $this->pagination->initialize($config);
    $invet = $this->modelo->obtieneTodoInventario($config['per_page'], $config['uri_segment']);

    $datos['inventario'] = $invet;


  //$datos['inventario'] = $this->modelo->ObtieneInventario();
  $this->load->view('mostrarInventario_view',$datos);
}

function buscarLibroClave(){
  $claveLibro = $this->input->post('claveLibro');
  $libroEncontrado = $this->modelo->buscarLibroPorClave($claveLibro);
  if ($libroEncontrado) {
    $datos['inventario'] = $libroEncontrado;
  	$this->load->view('mostrarInventario_view',$datos);
  }else{
    $datos['inventario'] = FALSE;
  	$this->load->view('mostrarInventario_view',$datos);
  }
}

}