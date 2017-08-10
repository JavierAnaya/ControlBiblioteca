
	<center><h2>Nuevo prestamo</h2></center>
<form id="prestamo" action="<?php echo base_url(); ?>index.php/PrestamoLibro/PrestarLibro" method="post">


<div class="row">
	<div class="col-md-6">
	<center><h3>Datos del usuario</h3></center>
	</br>
		<div class="form-horizontal">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Matricula</label>
			    <div class="col-sm-4">
			      <input type="text" id="matricula" name="matricula" class="form-control"  placeholder="Matricula" required>
			    </div>
			    <div class="col-sm-2">
			    	<button id="btnBus-usuario" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
			    </div>
			 </div>
		</div>
		<div id="info-usuario">

		</div>

	</div>

	<div class="col-md-6">
	<center><h3>Datos del libro</h3></center>
	</br>
		<div class="form-horizontal">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Clave</label>
			    <div class="col-sm-4">
			      <input type="text"  class="form-control" id="clave" name="clave" placeholder="Clave" required>
			    </div>
			    <div class="col-sm-2">
			    	<button id="btnBus-libro" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
			    </div>
			 </div>
		</div>
		<div id="info-libro">

		</div>
	</div>

</div>
<div class="row">
	<div class="col-md-12 ">
	<center>
		<table>
			<tr>
				<td>Fecha estimada de regreso de libro:</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="date" class="form-control"  name="fechaEntrega" id="fecha" required></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>Tipo de prestamo:</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>
					<select class="form-control" name="opciones">
                         <option value="En clase">En clase</option>
                         <option value="A casa">A casa</option>
                     </select>
                </td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save" target="_blank"></span>  Registrar prestamo </button></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
		</table>
	</center>
	</div>
</div>
</form>







<div class="row">
	<div class="col-md-12">
	</br>
	</br>
		<center><p class="bg-primary">Libros prestados</p></center>
	</div>
</div>
<div class="row">

	<div id="libros_cargados">

	</div>
</div>


