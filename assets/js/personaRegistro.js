$(document).ready(function(){
  
  $("#guardarPersona").submit(function(evento){
  	evento.preventDefault();

	  	alertify.confirm("Se guardaran los cambios ¿Desea continuar?", function (e) {
		    if (e) {
		        alertify.success("Se gurado correctamente");
		        $.ajax({
		        	url:$("form").attr("action"),
		        	type:$("form").attr("method"),
		        	data:$("form").serialize(),
		        	success:function(respuesta){
		        		if (respuesta.replace(/^\s|\s+$/g, "") =="exito") {
		        			var mensaje = alertify.success("El registro se guardo correctamente");
		        			if (mensaje) {
		        				console.log("Se esta recargando la pagina");
		        				location.reload();
		        			}
		        			//alertify.success("El registro se guardo correctamente");
		        			
		        		}else{
		        			alertify.error("Error en el servido \n vuelva a intentarlo mas tarde");
		        		}
		        	}
		        })
		    } else {
		       alertify.success("Se ha cancelado el evento");
		    }
		});
  	console.log("dio click en guardar");
  });

  $("#registraEditarPersona").submit(function(evento){
  	evento.preventDefault();
  	console.log("Guardar editar");
  	alertify.confirm("Se guardaran los cambios ¿Desea continuar?", function (e) {
		    if (e) {
		        alertify.success("Se gurado correctamente");
		        $.ajax({
		        	url:$("form").attr("action"),
		        	type:$("form").attr("method"),
		        	data:$("form").serialize(),
		        	success:function(respuesta){
		        		if (respuesta.replace(/^\s|\s+$/g, "") =="exito") {
		        			var mensaje = alertify.success("El registro se guardo correctamente");
		        			if (mensaje) {
		        				console.log("Se esta recargando la pagina");
		        				window.location="http://localhost/proyectoCBT/index.php/ListaUsuario/"
		        				
		        			}
		        			//alertify.success("El registro se guardo correctamente");
		        			
		        		}else{
		        			alertify.error("Error en el servido \n vuelva a intentarlo mas tarde");
		        		}
		        	}
		        })
		    } else {
		       alertify.success("Se ha cancelado el evento");
		    }
		});
  });



  $(".btn_elininarAl").click(function(evento){
  	var direccion = $(this).attr("href");
  	evento.preventDefault();
  	console.log("Eliminar Alumno->>"+direccion);
  	alertify.set({ labels: {
		    ok     : "Continuar",
		    cancel : "Cancelar"
			} });
		alertify.confirm("¿Deseas eliminar a este alumno?", function (e) {
			if (e) {
				console.log("Dio->>SI");
				$.ajax({
					url:direccion,
					type:"post",
					data:"null",
					success:function(resp){
						if (resp.replace(/^\s|\s+$/g, "")=="exito") {
							alertify.success("Alumno eliminado correctamente");
							location.reload();	
							console.log("Exito en la eliminacion");
						}else{
							alertify.error("No pude ser eliminado por entregas pendientes");
							console.log("Error en la eliminacion");
						}
					}
				});
			}else{
				alertify.success("Se ha cancelado el evento");
			}
		});

  });

});