window.onload=function(){
	MostrarTodosLosLibros();

	$("#btn_buscarDeudor").click(function(evento){
		MostrarUsuario();
	});
}

function MostrarTodosLosLibros(){
		$("#datos_usuarios_deudores").load("http://localhost/proyectoCBT/index.php/EntregaLibro");
}

function MostrarUsuario(){
	var dato =$("#txt_matricula").val();

	dato = dato.trim();
	console.log("Dato--> "+dato)
	if (dato !="") {
		$("#datos_usuarios_deudores").load("http://localhost/proyectoCBT/index.php/EntregaLibro/MustraLibrosAlumno",{matricula:dato});
	}else{
		MostrarTodosLosLibros();
	}
	

}

