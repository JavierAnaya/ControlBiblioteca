<div class="row">
	<?php if ($editar): ?>
		<center><h2>Editar usuario de biblioteca</h2></center>
	<?php else: ?>
		<center><h2>Registro de usuario de biblioteca</h2></center>
	<?php endif ?>
	
</div>
</br>
</br>


<?php if ($editar): ?>
	<form action="<?php echo base_url(); ?>index.php/RegistroPersona/guardarEditPersona" method="post" id="registraEditarPersona">
<?php else: ?>
<form action="<?php echo base_url(); ?>index.php/RegistroPersona/registrar" method="post" id="guardarPersona">
<?php endif ?>
	<div class="form-horizontal">
			
				
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<div class="form-group">
			        <label class="control-label col-xs-3">Matricula:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula de alumno o profesor" <?php if ($editar): ?>
			            	value="<?php echo $matricula;?>"
			            <?php endif ?>  required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Nombre:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre/s" <?php if ($editar): ?>
			            	value ="<?php echo $nombre; ?>"
			            <?php endif ?>  required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Apellido Paterno:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="apPaterno" name="apPaterno" placeholder="Apellido paterno" <?php if ($editar): ?>
			            	value="<?php echo $apPaterno; ?>"
			            <?php endif ?>  required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Apellido Materno:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="apMaterno" name="apMaterno" placeholder="apellido materno" <?php if ($editar): ?>
			            	value="<?php echo $apMaterno; ?>"
			            <?php endif ?>  required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Sexo:</label>
			        <div class="col-xs-4">
			            <select class="form-control" name="sexo" required>
			            	<?php if ($editar): ?>
								<?php if ($sexo=='Hombre'): ?>
										<option value="Hombre">Hombre</option>
	               						<option value="Mujer">Mujer</option>
	               				<?php else: ?>
	               						<option value="Mujer">Mujer</option>
		               					<option value="Hombre">Hombre</option>
		               					
								<?php endif ?>	
			            	<?php else: ?>
								<option value="Hombre">Hombre</option>
	               				<option value="Mujer">Mujer</option>
			            	<?php endif ?>
	               			
	               		</select>
			    </div>
			    </div>

			     <div class="form-group">
			        <label class="control-label col-xs-3">Carrera:</label>
			        <div class="col-xs-7">
			            <select class="form-control" name="carrera" required>
			            	<?php if ($editar): ?>
			            		<?php if ($carrera=='Técnico en informática'): ?>
					            	<option value="Técnico en informática">Técnico en informática</option>
			               			<option value="Técnico en diseño asistido por computadora">Técnico en diseño asistido por computadora</option>
			               			<option value="N/A">No aplica</option>
			               		<?php elseif ($carrera =='Técnico en diseño asistido por computadora'): ?>
			               			<option value="Técnico en diseño asistido por computadora">Técnico en diseño asistido por computadora</option>
			               			<option value="Técnico en informática">Técnico en informática</option>
			               			<option value="N/A">No aplica</option>

			               		<?php else: ?>
									<option value="N/A">No aplica</option>
									<option value="Técnico en informática">Técnico en informática</option>
		               				<option value="Técnico en diseño asistido por computadora">Técnico en diseño asistido por computadora</option>
			            		<?php endif ?>
			            	<?php else: ?>
				            	<option value="Técnico en informática">Técnico en informática</option>
		               			<option value="Técnico en diseño asistido por computadora">Técnico en diseño asistido por computadora</option>
		               			<option value="N/A">No aplica</option>
			            	<?php endif ?>
	               			
	               		</select>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Grado:</label>
			        <div class="col-xs-3">
			            <select class="form-control" name="grado" required>
			            	<?php if ($editar): ?>
								<?php if ($grado=='Primero'): ?>
									<option value="Primero">1ro</option>
			               			<option value="Segundo">2do</option>
			               			<option value="Tercero">3ro</option>
			               			<option value="N/A">No aplica</option>
								<?php elseif($grado=='Segundo'): ?>
			               			<option value="Segundo">2do</option>
			               			<option value="Primero">1ro</option>
			               			<option value="Tercero">3ro</option>
			               			<option value="N/A">No aplica</option>
			               		<?php elseif($grado=='Tercero'): ?>
			               			<option value="Tercero">3ro</option>
			               			<option value="Primero">1ro</option>
			               			<option value="Segundo">2do</option>
			               			<option value="N/A">No aplica</option>
			               		<?php else: ?>
			               			<option value="N/A">No aplica</option>
			               			<option value="Primero">1ro</option>
			               			<option value="Segundo">2do</option>
			               			<option value="Tercero">3ro</option>
								<?php endif ?>
			            	<?php else: ?>
								<option value="Primero">1ro</option>
		               			<option value="Segundo">2do</option>
		               			<option value="Tercero">3ro</option>
		               			<option value="N/A">No aplica</option>
			            	<?php endif ?>
	               			
	               		</select>
			    </div>
			    </div>


			</div>
		</div>


		<!--  -->
		<div class="col-md-6 col-md-offset-5">
				<button type="submit" class="btn btn-primary" name="guardar"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
		</div>
	</div>
</form>
