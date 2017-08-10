$(document).on("ready",main);

function main(){
	$("#acceder").click(function(evento){
		var user = $("#txt_usuario").val();
		var pass = $("#txt_pass").val();

		if (user=="") {
			alert("Falta Usuario...");
			alertify.error("Falta introducir el usuario");
		}else if(pass=="")
		{
			alertify.error("Contraseña incorrecta...");
			$("#contenedorContraseña").addClass("form-group has-error");
		}else{
			event.preventDefault();
			$.ajax({
				url:"http://localhost/proyectoCBT/index.php/Principal/login/",
				type:"post",
				data:{usuario:user,contrasenia:pass},
				success:function(respuesta){
					if (respuesta.replace(/^\s|\s+$/g, "") == "logueado") {
						console.log("El usuario entro al sistema");
						location.reload();
					}else{
						$("#contenedorContraseña").addClass("form-group has-error");
						alert("Error en el servidor: "+respuesta);
					}
				}
			});
		}
	});


}
