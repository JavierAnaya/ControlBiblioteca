<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  //require_once APPPATH."third_party/html2pdf/html2pdf.class.php";
//require_once(dirname(__FILE__).'/../third_party/html2pdf/vendor/autoload.php');

class ImprimirReciboPrestamo extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('modelo');
    if (!$this->session->userdata('login')) {
      echo header("Location:".base_url()."index.php/Principal");
    }
  }



  function index(){
    $idPrestamo = 72;//$this->input->post('idPrestamo');
    //buscar los datos de la base y asignarlos a las variables
    $datosImprimir = $this->modelo->optieneDatosImprimirComprobante($idPrestamo);

   
  
    
    //Preparar los datos para la imprecion del documento
    $MatriculaAlumno ="";
    $nombre = "";
    $grado = "";
    $claveLibro = "";
    $fechaPrestamo ="";
    $fechaEntrega="";
    $FechaLimiteEntrega ="";
    $tipoPrestamo="";
    $datosLibro = "";
  

    foreach ($datosImprimir as $dato) {

      $MatriculaAlumno = $dato->MatriculaAlumno;
      $nombre = $dato->nombre;
      $grado = $dato->grado;
      $claveLibro = $dato->ClaveLibro;
      $fechaPrestamo = $dato->FechaPrestamo;
      $fechaEntrega = "Pendiente";
      $FechaLimiteEntrega = $dato->FechaLimiteEntrega;
      $tipoPrestamo = $dato->TipoPrestamo;
      $datosLibro = $dato->datosLibro;
        
      }
//-----------------------------------contenido del documento----------------------------------
    $datos['MatriculaAlumno'] =$MatriculaAlumno;
    $datos['Nombre'] =$nombre;
    $datos['Grado'] =$grado;
    $datos['ClaveLibro'] =$claveLibro;
    $datos['FechaPrestamo'] =$fechaPrestamo;
    $datos['FechaEntrega'] =$fechaEntrega;
    $datos['FechaLimiteEntrega'] =$FechaLimiteEntrega;
    $datos['TipoPrestamo'] =$tipoPrestamo;
    $datos['DatosLibro'] =$datosLibro;
    $this->load->view('modeloRecibo_view',$datos);

  }



  public function ImprimirComprobantes(){
  	$idPrestamo = $this->modelo->obtieneUltimoPrestamo();//$this->input->post('idPrestamo');
  	//buscar los datos de la base y asignarlos a las variables
  	$datosImprimir = $this->modelo->optieneDatosImprimirComprobante($idPrestamo);
    if (!is_null($datosImprimir)) {
  	//Preparar los datos para la imprecion del documento
  	$MatriculaAlumno ="";
  	$nombre = "";
  	$grado = "";
  	$claveLibro = "";
  	$fechaPrestamo ="";
  	$fechaEntrega="";
  	$FechaLimiteEntrega ="";
  	$tipoPrestamo="";
  	$datosLibro = "";
  
  	foreach ($datosImprimir as $dato) {
    		$MatriculaAlumno = $dato->MatriculaAlumno;
    		$nombre = $dato->nombre;
    		$grado = $dato->grado;
    		$claveLibro = $dato->ClaveLibro;
    		$fechaPrestamo = $dato->FechaPrestamo;
    		$fechaEntrega = "Pendiente";
    		$FechaLimiteEntrega = $dato->FechaLimiteEntrega;
    		$tipoPrestamo = $dato->TipoPrestamo;
    		$datosLibro = $dato->datosLibro;
      }
//-----------------------------------contenido del documento----------------------------------
    $datos['MatriculaAlumno'] =$MatriculaAlumno;
    $datos['Nombre'] =$nombre;
    $datos['Grado'] =$grado;
    $datos['ClaveLibro'] =$claveLibro;
    $datos['FechaPrestamo'] =$fechaPrestamo;
    $datos['FechaEntrega'] =$fechaEntrega;
    $datos['FechaLimiteEntrega'] =$FechaLimiteEntrega;
    $datos['TipoPrestamo'] =$tipoPrestamo;
    $datos['DatosLibro'] =$datosLibro;
    ob_start();
    $this->load->view('modeloRecibo_view',$datos);
        //view('reportesPDF.reporteInventario');
    $content = ob_get_clean();
    // convert
    require_once(dirname(__FILE__).'/../third_party/prueba/html2pdf/html2pdf.class.php');
      //require_once(dirname(__FILE__).'/../third_party/vendor/autoload.php');
          //use Vendor/Spipu\Html2Pdf\Html2Pdf;
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3); //Configura la hoja
        $html2pdf->pdf->SetDisplayMode('fullpage'); //Ver otros parámetros para SetDisplaMode
        $html2pdf->writeHTML($content); //Se escribe el contenido 
        $html2pdf->Output('comprobate.pdf'); //Nombre default del PDF
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
    //$this->load->view('modeloRecibo_view',$datos);
  	//--------------------------------imprecion del documento--------------------------------------
      }else{
        echo "Error al consultar";
      }
  	/*------------------termina la imprecion del comprobante-----------------------*/
  }

}