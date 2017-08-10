

$(document).on("ready",main);
function main(){

$("#contenido_inventario").load("http://localhost/proyectoCBT/index.php/MostrarInventario");

$("#formEditarGuardar").submit(function (event){
	event.preventDefault();
		alertify.set({ labels: {
		    ok     : "Guardar",
		    cancel : "Cancelar"
		} });
		alertify.confirm("¿Desea guadar los cambios?", function (e) {
				/*inicia registr del libro*/
				if (e) {
					$.ajax({
						url:$("form").attr("action"),
						type:$("form").attr("method"),
						data:$("form").serialize(),
						success:function(respuesta){
							if (respuesta.replace(/^\s|\s+$/g, "") == "exito") {
								alertify.success("Registro guardado correctamente");
								window.location="http://localhost/proyectoCBT/index.php/Inventario/";
							}else{
								alertify.error("Error en el servidor");
							}
						}
					});
				}

				/*Termina registro del libro*/
					
				else {
					alertify.success("Se ha cancelado el evento");
				}
			});

		
		
});


$("#nuevoGuardar").submit(function(evento){
	evento.preventDefault();
	alertify.set({ labels: {
		    ok     : "Guardar",
		    cancel : "Cancelar"
		} });
	alertify.confirm("¿Desea guadar los cambios?", function (e) {
	    if (e) {
	        $.ajax({
				url:$("form").attr("action"),
				type:$("form").attr("method"),
				data:$("form").serialize(),
				success:function(respuesta){
					if (respuesta.replace(/^\s|\s+$/g, "") == "exito") {
						alertify.success("Registro guardado correctamente");
						window.location="http://localhost/proyectoCBT/index.php/Inventario/";
					}else{
						alertify.error("Error en el servidor");
					}
				}
			});
	    } else {
	        alertify.success("Se ha cancelado el evento");
	    }
	});
});



$(".btn_elininarIn").click(function(event){
		var direccion = $(this).attr("href");
		event.preventDefault();
		
		console.log("codigo de eliminacion--->"+direccion);
		alertify.set({ labels: {
		    ok     : "Continuar",
		    cancel : "Cancelar"
			} });
		alertify.confirm("¿Deses eliminarlo del inventario?", function (e) {
			if (e) {
				console.log("Dio->>SI");
				$.ajax({
					url:direccion,
					type:"post",
					data:"null",
					success:function(resp){
						if (resp.replace(/^\s|\s+$/g, "")=="exito") {
							alertify.success("Libro eliminado correctamente");
							location.reload();	
							console.log("Exito en la eliminacion");
						}else{
							alertify.error("No se puede eliminar el libro porque ha sido prestado \n intente mas tarde");
							console.log("Error en la eliminacion");
						}
					}
				});
			}else{
				alertify.success("Se ha cancelado el evento");
			}
		});


	});


	/*$(".Ineditar").click(function(evento){
		

		event.preventDefault();
			
	});*/



/*
	$("#btn_buscar_Inventario").click(function(evento){
		var clave = $("#clave_buscar_inventario").val();

		$("#contenido_inventario").load("http://localhost/proyectoCBT/index.php/MostrarInventario/buscarLibroClave",{claveLibro:clave});

	});*/


}