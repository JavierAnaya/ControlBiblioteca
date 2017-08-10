<div class="row">
	<div class="col-xs-3">
		<img id="headerLogo" src="<?php echo base_url(); ?>/assets/img/CBTLogo.png">	
	</div>
	<div class="col-sm-8">
		<center><h1 id="textoHeaderLogo">Sistema de control de biblioteca escolar</h1></center>
	</div>
</div>
<div class="row">
<div class="col-sm-8 col-sm-offset-4">
	
	<?php if (!$this->session->userdata('login')): ?>
	<div id="frmlogin">
		<div class="form-horizontal">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Usuario:</label>
			    <div class="col-sm-4">
			    	<select class="form-control" id="txt_usuario">
			    		<option value="Administrador">Administrador</option>
			    	</select>
			    </div>
			  </div>
			  <div class="form-group" id="contenedorContraseña">
			    <label for="inputPassword3" class="col-sm-2 control-label">Contraseña:</label>
			    <div class="col-sm-4" >	
			      <input type="password" class="form-control" id="txt_pass" placeholder="Contraseña">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-2">
			      <button type="button" id="acceder" class="btn btn-default" >Acceder</button>
			    </div>
			  </div>
		</div>
	</div>
	<?php endif ?>
	

</div>

</div>