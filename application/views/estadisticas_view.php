<style>
	#Grafica{
		height: 800px;
		width: 800px;

	}
	#contenidoGrafica{
		margin-left: 200px;
		margin-right: 30px;
		margin-bottom: auto;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<center><h2>Estadisticas de Biblioteca</h2></center>
	</div>
</div>

<div class="row">
	<div class="form-inline">
		<label>Generar estadistica por: </label>
		<select class="form-control" name="ConPor" id="ConPor">
			<option value="tiempoVisita">Intervalo(Todos los registros)</option>
			<option value="genero">Genero(Hombre,Mujer)</option>
			<option value="grados">Grados</option>
			<option value="carrera">Carrera(Tec. en Informatica, Tec. en Diseño)</option>
		</select>
		<label>  de </label>
		<select class="form-control" name="inicioMes" id="inicioMes">
			<option value="01">Enero</option>
			<option value="02">Febrero</option>
			<option value="03">Marzo</option>
			<option value="04">Abril</option>
			<option value="05">Mayo</option>
			<option value="06">Junio</option>
			<option value="07">Julio</option>
			<option value="08">Agosto</option>
			<option value="09">Septiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>
		</select>
		<label> de </label>
		<select class="form-control" id="anioInicio">
			<?php for ($i=date('Y'); $i >=2016; $i--):?>
				<?php echo "<option value=".$i.">".$i."</option>" ?>
			<?php endfor; ?>
		</select>
		<label>     a    </label>
		<select class="form-control" name="finMes" id="finMes">
			<option value="02">Febrero</option>
			<option value="03">Marzo</option>
			<option value="04">Abril</option>
			<option value="05">Mayo</option>
			<option value="06">Junio</option>
			<option value="07">Julio</option>
			<option value="08">Agosto</option>
			<option value="09">Septiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>
		</select>
		<label> de </label>

		<select class="form-control" id="anioFin">
			<?php for ($i=date('Y'); $i >=2016; $i--):?>
				<?php echo "<option value=".$i.">".$i."</option>" ?>
			<?php endfor; ?>
		</select>

		<button class="btn btn-primary" id="btn_consultar">Consultar</button>

		<!-- campos ocultos para la verificacion de fechas -->
		<input type="hidden" value="<?php echo date('m'); ?>" id="f_mesActual">
		<input type="hidden" value="<?php echo date('Y'); ?>" id="f_anioActual">
		<!-- termina campos ocultos -->

	</div>
</div>

<div class="row">
	<div class="panel panel-default">
  <!-- Default panel contents -->
	  <div class="panel-heading">Estadisticas</div>
	  <div class="panel-body">
			<!-- Contenido de la cabecera o cuerpo del contenedor o panel -->
	  </div>

	  <!-- Table -->
		<div id="contenidoGrafica">
			<div id="Grafica">  <!--para mostrar la grafica-->
				<canvas id="myGrafica"></canvas>
			</div>
		</div>

	</div>
</div>
