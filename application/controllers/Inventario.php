<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario extends CI_Controller {
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
    $config['base_url'] = base_url().'index.php/inventario/pagina/';
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
    $config['first_link'] = 'Inicio';
    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo;';
    $config['last_link'] ='Final';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';



    /* Se inicializa la paginacion*/
    $this->pagination->initialize($config);
    $invet = $this->modelo->obtieneTodoInventario($config['per_page'], $this->uri->segment(3));




    //$datos['inventario'] = $this->modelo->ObtieneInventario();

	 $datos['inventario'] = $invet;
  	$datos['titulo'] = 'Inventario';
    $datos['buscar'] = FALSE;
    $datos['iniCont'] = $this->uri->segment(3);
  	$this->load->view('header',$datos);
    $this->load->view('inventario_view',$datos);
    $this->load->view('footer');
}
  //termina la clase

function eliminarInventario(){
  //EliminarMaterial
  $codigo = $this->uri->segment(3);
  $eliminar = $this->modelo->EliminarMaterial($codigo);
  if ($eliminar) {
    echo "exito";
  }else
  {
    echo "error";
  }
}

function editarInventario(){
  $codigo = $this->uri->segment(3);
 // echo "Redirecinando ";
  $this->editarLibro($codigo);
}

function editarLibro($codigo){
  //obtener los datos del libro para editarlo
  //declaracion de varibles temporales
  $titulo="";
  $autor="";
  $editorial="";
  $observaciones="";
  $cantidad=0;
  $tipoLibro="";
  $datosLibro = $this->modelo->OptieneDatosEditarLibro($codigo);

    foreach ($datosLibro as $dato) {
      $titulo=$dato->Titulo;
      $autor=$dato->Autor;
      $editorial= $dato->Editorial;
      $observaciones=$dato->Observaciones;
      $cantidad=$dato->Cantidad;
      $tipoLibro = $dato->TipoLibro;
    }
  //termin la obtencion de los datos

  $datos['editar']=TRUE;
  $datos['clave'] = $codigo;
  $datos['tituloLib'] = $titulo;
  $datos['autor'] = $autor;
  $datos['editorial']= $editorial;
  $datos['observaciones'] = $observaciones;
  $datos['cantidad'] = $cantidad;
  $datos['titulo'] = 'Registrar';
  $datos['tipoLib'] = $tipoLibro; 
  $this->load->view('header',$datos);
  $this->load->view('registroLibro_view',$datos);
  $this->load->view('footer');

}


function buscarLibro(){
  $dato = $this->input->post('buscar');
  $encontrado = $this->modelo->seachLibro($dato);
 
    $datos['inventario'] = $encontrado;
    $datos['titulo'] = 'Inventario';
    $datos['buscar'] = TRUE;
    $datos['iniCont'] = '0';
    $this->load->view('header',$datos);
    $this->load->view('inventario_view',$datos);
    $this->load->view('footer');
}



function operacionesInventario(){
  $id = $this->uri->segment(3);
  $opcion = $this->input->post('operacion');
  echo "entro";
  /*

  //echo $opcion;
  if ($opcion==="editar") {
    $this->editarInventario($id);
  }
  elseif ($opcion==="eliminar") {
   $this->eliminarInventario($id);
  }else{
   echo "Error al";
  }
*/
  
}

function buscarLibroClave(){
  $claveLibro = $this->input->post('clave');
  $libroEncontrado = $this->modelo->buscarLibroPorClave($claveLibro);
  if ($libroEncontrado) {
    echo "exito";
  }else{
    echo "error";
  }
}
//fucnciones para la imprecion de inventarios

function imprimirInventaioBibliografico(){

  $datosInventario = $this->modelo->obtineInventarioBibliografico();
  $datos['inventario'] = $datosInventario;
  $datos['tipoInventario'] = ' Bibliográfico';
    ob_start();
      $this->load->view('modeloInventarioBlibliografico_view',$datos);
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
        $html2pdf->Output('InventarioBibliografico.pdf'); //Nombre default del PDF
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

}

function imprimirInventarioHemerografico(){

  $datosInventario = $this->modelo->obtieneInventarioHemerobrafico();
  $datos['inventario'] = $datosInventario;
  $datos['tipoInventario'] = ' Hemerográfico';
    ob_start();
      $this->load->view('modeloInventarioBlibliografico_view',$datos);
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
        $html2pdf->Output('InventarioBibliografico.pdf'); //Nombre default del PDF
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}

function imprimitTodoInventario(){
  $datosInventario = $this->modelo->ObtieneInventario();
  $datos['inventario'] = $datosInventario;
  $datos['tipoInventario'] = ' de biblioteca';
    ob_start();
      $this->load->view('modeloInventarioBlibliografico_view',$datos);
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
        $html2pdf->Output('InventarioBibliografico.pdf'); //Nombre default del PDF
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}

//fucncion para generar excel
function generarExcelAllInnventario(){
  require_once(dirname(__FILE__).'/../third_party/phpexcel/PHPExcel.php');
   $datosInventario = $this->modelo->ObtieneInventario();
  $objPHPExcel = new PHPExcel();

  $objPHPExcel->getProperties()
              ->setCreator("Cattivo")
              ->setLastModifiedBy("Cattivo")
              ->setTitle("Inventario de biblioteca")
              ->setSubject("inventario")
              ->setDescription("CBT Jilotepec")
              ->setKeywords("Excel Office 2007 openxml php")
              ->setCategory("INVENTARIOS");

 

// Agregar Informacion

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Numero')
            ->setCellValue('B1', 'Clave')
            ->setCellValue('C1', 'Titulo')
            ->setCellValue('D1', 'Autor')
            ->setCellValue('E1', 'Editorial')
            ->setCellValue('F1', 'Existencia');

$i=2;
$count =1;
foreach ($datosInventario as $valor ) {
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$i, $count)
              ->setCellValue('B'.$i, $valor->ClaveLibro)
              ->setCellValue('C'.$i, $valor->Titulo)
              ->setCellValue('D'.$i, $valor->Autor)
              ->setCellValue('E'.$i, $valor->Editorial)
              ->setCellValue('F'.$i, $valor->Cantidad);
              $i++;
              $count++;
}



 
//agregamos el autotamaño de las celdas
for($i = 'A'; $i <= 'F'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Inventario de biblioteca');
 
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
 
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="inventario.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
}


//para terminar estarte se debe de configurar las obciones del servidor esto para qur todas lasfunciones esten correstamente en tosdoa los aspectos
//termina las funciones 



}
