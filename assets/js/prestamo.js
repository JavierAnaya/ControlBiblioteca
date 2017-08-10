$(document).on("ready",main);
 var UsuarioEncontrado=false;
 var LibroEncontrado = false;

function main(){

//evetos de datos de alumno
	$("#matricula").keypress(function(evento){
		var dato=$("#matricula").val() ;
		if (evento.keyCode == 13) {
			evento.preventDefault();
			buscaraUsuarioEvento(dato);
		}
	});

	/*$("#matricula").focusout(function(evento){
		var dato=$("#matricula").val() ;
		if (dato=="") {
			alert("No se ha introducido la matricula");
			$("#matricula").val("0");
			document.getElementById("matricula").style.background='#FFDDDD';
		}else{
			evento.preventDefault();
			buscaraUsuarioEvento(dato);
		}
	});*/

	$("#btnBus-usuario").click(function(evento){
		var dato=$("#matricula").val() ;
		var matr = document.getElementById("matricula");
		if (dato=="") {
			alert("No de ha escrito nada");
		}else{
			evento.preventDefault();
			buscaraUsuarioEvento(dato);
		}
	});

//eventos de datos de libros
	$("#clave").keypress(function(evento){
		var dato = $("#clave").val();
		if (evento.keyCode ==13) {
			evento.preventDefault();
			buscarLibroEvento(dato);
		}

	});

	/*$("#clave").focusout(function(evento){
		var dato = $("#clave").val();
		if (dato=="") {
			alert("No se ha introducido la clave");
			$("#clave").val("0");
			document.getElementById("clave").style.background='#FFDDDD';
		}else{
			evento.preventDefault();
			buscarLibroEvento(dato);
		}
	});*/

	$("#btnBus-libro").click(function(evento){
		var dato = $("#clave").val();
		if (dato=="") {
			alert("No ha introducido la clave del libro \n vuelva a intentarlo")
		}else{
			evento.preventDefault();
			buscarLibroEvento(dato);
		}
	});

	//eventos para guardar el libro que se esta prestando


	$("#prestamo").submit(function(event){
		event.preventDefault();
		if (UsuarioEncontrado ==true && LibroEncontrado==true) {
			$.ajax({
				url:$(this).attr("action"),
				type:$(this).attr("method"),
				data:$(this).serialize(),
				success:function(respuesta){
			          if (respuesta.replace(/^\s|\s+$/g, "")=="nopuede") {
			          	  alertify.error("El usuario no puede tener mas de tres libros prestados \n o ya tiene registrado un libro igual");
				          		//obtencion del id de prestamo
				          		//termina obtencion
				          		var url = "ImprimirReciboPrestamo/ImprimirComprobantes";
				          		var abrirUrl = window.open(url,'_blank');
				          		console.log("abrir url "+abrirUrl);
				          		if (abrirUrl) {
				          			alertify.success("Imprimiendo recibo de prestamo");
				          			location.reload();
				          		}else{
				          			alertify.error("Error al abrir el recibo revise que este activado las ventajas emergentes");
				          		}
				          }
				          // se tiene que realizar la imprecion del docuemnto comprobante para la 
				          //la biblioteca para que se pueda realizar el prestamo correspondiente
			          //Window.Location();
						}
			});
		}else{
			alert("No se puede procesar la informacion \n no existe el el usuario o el libro \n verifique los datos y vuelve a intentarlo")
		}

	});


	//termina la funcion principal de el sistema
}

function buscaraUsuarioEvento(dato){
	$.ajax({
		url:"http://localhost/proyectoCBT/index.php/PrestamoLibro/CargarAlumno",
		type:"POST",
		data:{matricula:dato},
		success:function(respuesta){
			if (respuesta.replace(/^\s|\s+$/g, "") != "error") {
				var registros = eval(respuesta);
				UsuarioEncontrado = true;
				for (var i = 0; i < registros.length; i++) {
					html ="<table class=\"table table-striped\"><tr><td><strong>Nombre: </strong></td><td> "+registros[i]["Nombre"]+" "+registros[i]["ApPaterno"]+" "+registros[i]["ApMaterno"]+"</td></tr><tr><td><strong>Carrera: </strong></td><td> "+registros[i]["Carrera"]+"</td></tr><tr><td><strong>Grado: </strong></td><td> "+registros[i]["Grado"]+"</td></tr></table>" ;
				}
				$("#info-usuario").html(html);
				MostrarLibrosPendientes();
			}else{
				UsuarioEncontrado =  false;
				alert("Datos no encontrados por el sistema");
				html= "<center><h4 id=\"mensaje-error\">No de ha encotrado coincidencias</h4></center>";
				$("#info-usuario").html(html);

				//MostrarUsuariosPendientes();
				alert("Datos no encontrados por el sistema");

			}
		}
	});
}

function buscarLibroEvento(dato){
	$.ajax({
		url:"http://localhost/proyectoCBT/index.php/PrestamoLibro/CargarLibro",
		type:"POST",
		data:{clave:dato},
		success:function(respuesta){
			if (respuesta.replace(/^\s|\s+$/g, "") != "error") {
				LibroEncontrado =true;
				var registros = eval(respuesta);
					for (var i = 0; i < registros.length; i++) {
						html ="<table class=\"table table-striped\"><tr><td><strong>Titulo: </strong></td><td> "+registros[i]["Titulo"]+"</td></tr><tr><td><strong>Autor: </strong></td><td> "+registros[i]["Autor"]+"</td></tr><tr><td><strong>Editorial: </strong></td><td> "+registros[i]["Editorial"]+"</td></tr></table>" ;
					}
					$("#info-libro").html(html);
			}else{
				LibroEncontrado=false;
				html= "<center><h4 id=\"mensaje-error\">No de ha encotrado coincidencias</h4></center>";
				$("#info-libro").html(html);
			}
		}
	});
}

function MostrarLibrosPendientes(){
	var dato = $("#matricula").val();
		$("#libros_cargados").load("http://localhost/proyectoCBT/index.php/EntregaLibro/MustraLibrosAlumno",{matricula:dato});
}

function MostrarLibrosPendientesNoHay(){
	html = "<center><h2>No se han encontrado prestamos con esa matricula</h2></center>";
	$("#libros_cargados").html(html);
}

function MuestraNulo(){
	html = "</br>";
	$("libros_cargados").html(html);
}
