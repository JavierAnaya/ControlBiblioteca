<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $servidor = '';
	private $esquemaBD;
	private $usuario;
	private $password;
	private $enlace;
	private $consulta;
	private $resultado;
  	private static $_singleton;

  public function __construct()
  {
    parent::__construct();
   	$this->servidor ='localhost';
    $this->esquemaBD = 'prueba';
    $this->usuario ='root';
    $this->password ='20100187';
    $this->conectar();
  }

  private function conectar(){
  		$this->enlace = new mysqli($this->servidor, $this->usuario, $this->password, $this->esquemaBD);
  		if ($this->enlace->connect_errno) {
  			echo "error al conectar";
  		}else{
  			echo "conectado";
  		}
  }

  private function consultar($query){
  	$this->consulta =$query;
  }

  private function ExtraerDatos(){
  	if(!($this->resultado= mysqli_query($this->consulta, $this->conexion))){
			return null;
		}
		else {
		//return $this->resource;
		$array = array();
		while ($row = @mysqli_fetch_object($this->resultado)){
			$array[] = $row;
		}
		return $array;
		}

  }

function index(){
   
}


}
