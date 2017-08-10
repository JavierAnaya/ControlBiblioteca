<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelo extends CI_Model {

public function ObtieneInventario(){
	  $consulta = $this->db->get('Libro');
      return $consulta->result();
}

public function ObtinenUsuariosBiblioteca(){
  $consulta = $this->db->get('Alumno');
  return $consulta->result();
}
//consultas para la imprecion de inventarios
public function obtineInventarioBibliografico(){
  $this->db->where('TipoLibro', 'BIBLIOGRÁFICO');
  $consulta =  $this->db->get('Libro');
  return $consulta->result();
}

public function obtieneInventarioHemerobrafico(){
  $this->db->where('TipoLibro', 'HEMEROGRÁFICO:');
  $consulta =  $this->db->get('Libro');
  return $consulta->result();
}

public function obtieneTodoInventario($numreg,$segment){
  $consulta =  $this->db->get('Libro',$numreg,$segment);
  return $consulta->result();
}


//paginate para todo el inventario

public function getTotalLibrosALL(){
  return $this->db->count_all('Libro');
}
public function getALLInventarioPaginate($porpagina){
    $query = $this->db->get('Libro',$porpagina);
    if( $query->num_rows > 0 )
      return $query->result();
    else
      return FALSE;
}
//termina las consultas para la imprecion de inventarios


//fuciones para registro y edicion de alumnos

public function getAlumnoEdit($matricula){
    $this->db->where('MatriculaAlumno',$matricula);
    $consulta = $this->db->get('Alumno');
    return $consulta->result();
}

public function saveAlumnoEdit($data,$matricula){
     $this->db->where('MatriculaAlumno', $matricula);
     $registro =  $this->db->update('Alumno', $data);
     if ($registro) {
       return TRUE;
     }else{
      return FALSE;
     }
  }

public function deleteAlumnoList($matricula){
  $this->db->where('MatriculaAlumno', $matricula);
  $eliminar = $this->db->delete('Alumno');
  if ($eliminar) {
    return TRUE;
  }else{
    return FALSE;
  }

}


//termina


public function seachLibro($datoBuscar){

  /*$this->db->like('Titulo', $datoBuscar);
  $this->db->like('ClaveLibro', $datoBuscar);
  $consulta = $this->db->get('Libro');*/
  $consulta = $this->db->query("select * from Libro where concat(ClaveLibro,' ',Titulo,' ',Autor,' ',Editorial,' ',TipoLibro) like  '%".$datoBuscar."%'");
  return $consulta->result();
}


public function GurdarLibro($clave,$titulo,$autor,$editorial,$observaciones,$cantidad,$tipoLibro){
	$sql =$this->db->query("INSERT INTO `Libro` (`ClaveLibro`, `Titulo`, `Autor`, `Editorial`, `Observaciones`, `Cantidad`, `Estatus`,`TipoLibro`) VALUES ('".$clave."', '".$titulo."', '".$autor."', '".$editorial."', '".$observaciones."', '".$cantidad."', '".$cantidad."','".$tipoLibro."')");
      if ($sql) {
        return TRUE;
      }else {
        return FALSE;
      }
}

public function GuardarPersona($matricula,$nombre,$apPaterno,$apMaterno,$sexo,$carrera,$grado){
	$sql =$this->db->query("INSERT INTO `Alumno` (`MatriculaAlumno`, `Nombre`, `ApPaterno`, `ApMaterno`, `Sexo`, `Carrera`, `Grado`) VALUES ('".$matricula."', '".$nombre."', '".$apPaterno."', '".$apMaterno."', '".$sexo."', '".$carrera."', '".$grado."')");
      if ($sql) {
        return TRUE;
      }else {
        return FALSE;
      }
}

public function EliminarMaterial($clave){
  $this->db->where('ClaveLibro', $clave);
  $sql =$this->db->delete("Libro");
      if ($sql) {

        return TRUE;

      }else {
        return FALSE;
      }
}

public function OptieneDatosEditarLibro($clave){
  $this->db->where('ClaveLibro', $clave);
  $consulta = $this->db->get('Libro');
      return $consulta->result();
}

public function GuardarActualizarLibro($clave,$titulo,$autor,$editorial,$observaciones,$cantidad,$tipoLibro){
  /*
$data = array(
        'title' => $title,
        'name' => $name,
        'date' => $date
);

$this->db->where('id', $id);
$this->db->update('mytable', $data);
// Produces:
//
//      UPDATE mytable
//      SET title = '{$title}', name = '{$name}', date = '{$date}'
//      WHERE id = $id

*/
  $sql =$this->db->query("UPDATE `Libro` SET `Titulo` = '".$titulo."', `Autor` = '".$autor."', `Editorial` = '".$editorial."', `Observaciones` = '".$observaciones."', `Cantidad` = '".$cantidad."', `Estatus` = '1', TipoLibro ='".$tipoLibro."'  WHERE `Libro`.`ClaveLibro` = '".$clave."'");
      if ($sql) {
        return TRUE;
      }else {
        return FALSE;
        echo "error";
      }
}

public function buscarAlumnoPorMatricula($dato){
      $this->db->where('MatriculaAlumno', $dato);
      $consulta = $this->db->get('Alumno');
      return $consulta->result();
}

public function buscarLibroPorClave($clave){
      $this->db->where('ClaveLibro',$clave);
      $consulta = $this->db->get('Libro');
      return $consulta->result();
}

public function registrarPrestamoLibro($data){
      $insertar = $this->db->insert('Prestamos', $data);
      if ($insertar) {
        return TRUE;
      }else{
        return FALSE;
      }
}

//usuarios deudores

public function optieneUsuariosDeudores(){
  $consulta = $this->db->query("Select Prestamos.idPrestamos,Prestamos.MatriculaAlumno,Prestamos.ClaveLibro,Prestamos.FechaPrestamo,Prestamos.FechaEntrega,
Prestamos.FechaLimiteEntrega,Prestamos.TipoPrestamo,Concat(Alumno.Nombre,' ',Alumno.ApPaterno,' ',Alumno.ApMaterno) as Nombre,Concat(Alumno.Grado,' ',Alumno.Carrera) as Carrera from Prestamos,Alumno
 where Alumno.MatriculaAlumno=Prestamos.MatriculaAlumno and Prestamos.FechaEntrega='0000-00-00'");
  return $consulta->result();
}

public function optieneLibrosPrestadosAlumnos($matricula){
  $consulta = $this->db->query("Select Prestamos.idPrestamos,Prestamos.MatriculaAlumno,Prestamos.ClaveLibro,Prestamos.FechaPrestamo,Prestamos.FechaEntrega,
Prestamos.FechaLimiteEntrega,Prestamos.TipoPrestamo,Concat(Alumno.Nombre,' ',Alumno.ApPaterno,' ',Alumno.ApMaterno) as Nombre,Concat(Alumno.Grado,' ',Alumno.Carrera) as Carrera from Prestamos,Alumno
 where Alumno.MatriculaAlumno=Prestamos.MatriculaAlumno and Prestamos.FechaEntrega='0000-00-00' and Prestamos.MatriculaAlumno=".$matricula);
  return $consulta->result();
}

public function verificaEntregasPendientes($matricula){
  $consulta = $this->db->query("select count(idPrestamos) as pendiente from Prestamos where FechaEntrega='0000-00-00' and MatriculaAlumno=".$matricula);
  $dato = $consulta->row();
  return $dato->pendiente;

}

//para registrar el regreso de un libro

public function mostrarLibrosUsuario($matricula){
      $consulta = $this->db->query("select Prestamos.* , concat(Alumno.Nombre,' ', Alumno.ApPaterno,' ',Alumno.ApMaterno) as Nombre,Concat(Alumno.Grado,' ',Alumno.Carrera) as Carrera from Prestamos,Alumno where  Prestamos.FechaEntrega='0000-00-00' and Prestamos.MatriculaAlumno=".$matricula." and Alumno.MatriculaAlumno=Prestamos.MatriculaAlumno;");
      return $consulta->result();
}

public function registrarEntrega($identificador,$fecha){
  $consulta = $this->db->query("update Prestamos set FechaEntrega='".$fecha."' where idPrestamos =".$identificador);
    if ($consulta) {
        return TRUE;
    }else
    {
        return FALSE;
    }
}

public function buscaLibrosIguales($matricula,$claveLibro){

  $consulta = $this->db->query("select count(ClaveLibro) as numero from Prestamos where MatriculaAlumno='".$matricula."' and ClaveLibro='".$claveLibro."' and FechaEntrega='0000-00-00'");
  $dato = $consulta->row();
  return $dato->numero;
}

//las funciones para el ligin
public function login($usuario,$contrasenia){
      $this->db->where('Usuario', $usuario);
      $this->db->where('Contrasenia', $contrasenia);
      $consulta = $this->db->get('Usuario');
      return $consulta->result();
}


//comprobantes
public function optieneDatosImprimirComprobante($idPrestamo){
    $consulta = $this->db->query("select Alumno.MatriculaAlumno , concat(Alumno.Nombre,' ',Alumno.ApPaterno,' ',Alumno.ApMaterno) as nombre,concat(Alumno.Grado,' ', Alumno.Carrera) as grado,Prestamos.*, concat(Libro.Titulo,' ',Libro.Autor,' ',Libro.Editorial) as datosLibro  from Prestamos,Libro,Alumno where Libro.ClaveLibro = Prestamos.ClaveLibro and Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Prestamos.idPrestamos=".$idPrestamo);
      return $consulta->result();
}
//termina funciones para login

//--------consultas para el modulo de estadisticas por sexo
public function obtieneDatosPorSexoHombre($fechaInicio,$fechaFin){
	$consulta = $this->db->query("select count(Prestamos.MatriculaAlumno) as hombre from Alumno,Prestamos where Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Alumno.Sexo='Hombre' and Prestamos.FechaPrestamo  BETWEEN '".$fechaInicio."' and '".$fechaFin."'");
	$dato = $consulta->row();
	return $dato->hombre;
  echo $dato->hombre;
}

public function obtieneDatosPorSexoMujer($fechaInicio,$fechaFin){
	$consulta = $this->db->query("select count(Prestamos.MatriculaAlumno) as mujer from Alumno,Prestamos where Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Alumno.Sexo='Mujer' and Prestamos.FechaPrestamo  BETWEEN '".$fechaInicio."' and '".$fechaFin."'");
	$dato = $consulta->row();
  return $dato->mujer;
  echo $dato->mujer;
}


public function obtenerPrestamosPorIntervalo(){

$consulta = $this->db->query("select count(Prestamos.idPrestamos) as total from  Prestamos where Prestamos.FechaPrestamo  BETWEEN '2017-01-31' and '2017-02-02';");
  $dato = $consulta->row();
  return $dato->total;

}

public function obtieneDatosPrestamoPrimerGrado($fechaInicio,$fechaFin){
  $consulta = $this->db->query("select count(Prestamos.MatriculaAlumno) as primero from Alumno,Prestamos where Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Alumno.Grado='Primero' and Prestamos.FechaPrestamo  BETWEEN '".$fechaInicio."' and '".$fechaFin."'");
  $dato = $consulta->row();
  return $dato->primero;

}


public function obtieneDatosPrestamoSegundoGrado($fechaInicio,$fechaFin){
    $consulta = $this->db->query("select count(Prestamos.MatriculaAlumno) as segundo from Alumno,Prestamos where Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Alumno.Grado='Segundo' and Prestamos.FechaPrestamo  BETWEEN '".$fechaInicio."' and '".$fechaFin."'");
  $dato = $consulta->row();
  return $dato->segundo;

}

public function obtieneDatosPrestamoTerceroGrado($fechaInicio,$fechaFin){
    $consulta = $this->db->query("select count(Prestamos.MatriculaAlumno) as tercero from Alumno,Prestamos where Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Alumno.Grado='Tercero' and Prestamos.FechaPrestamo  BETWEEN '".$fechaInicio."' and '".$fechaFin."'");
  $dato = $consulta->row();
  return $dato->tercero;
}

public function obtieneDatosPrestamoCarreraInformatica($fechaInicio,$fechaFin){
  $consulta = $this->db->query("select count(Prestamos.MatriculaAlumno) as informatica from Alumno,Prestamos where Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Alumno.Carrera='Técnico en informática' and Prestamos.FechaPrestamo  BETWEEN '".$fechaInicio."' and '".$fechaFin."'");
  $dato = $consulta->row();
  return $dato->informatica;
}
public function obtieneDatosPrestamoCarreraDiseno($fechaInicio,$fechaFin){
  $consulta = $this->db->query("select count(Prestamos.MatriculaAlumno) as diseno from Alumno,Prestamos where Alumno.MatriculaAlumno = Prestamos.MatriculaAlumno and Alumno.Carrera='Técnico en diseño asistido por computadora' and Prestamos.FechaPrestamo  BETWEEN '".$fechaInicio."' and '".$fechaFin."'");
  $dato = $consulta->row();
  return $dato->diseno;
}

/*para saber cuantas entregas se tiene pendientes para hoy*/
public function obtieneNumeroEntregasPendientes(){
  $consulta = $this->db->query("select count(idPrestamos) as cantidad from Prestamos where FechaLimiteEntrega = date_format(now(),'%Y-%m-%d') and FechaEntrega='0000-00-00'");
  $dato = $consulta->row();
  return $dato->cantidad;
}


public function obtieneUltimoPrestamo(){
  $consulta = $this->db->query("select max(idPrestamos) as idUltimo from Prestamos");
  $dato = $consulta->row();
  return $dato->idUltimo;
}
//termina las entregas pendientes





//termina la clase
}
