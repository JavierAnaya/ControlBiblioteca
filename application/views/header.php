<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="<?php echo base_url("assets\css\bootstrap.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets\css\sb-admin.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("assets\css/font-awesome.min.css");?>"   type="text/css">
    <link rel="stylesheet" href="<?php echo base_url("assets\css/alertify.core.css");?>">
   <link rel="stylesheet" href="<?php echo base_url("assets\css/alertify.default.css");?>" id="toggleCSS"> 
   <!--  <link rel="stylesheet" href="<?php echo base_url("assets\css/alertify.bootstrap.css");?>" id="toggleCSS"> -->

	<link rel="stylesheet" href="<?php echo base_url("assets\css/style.css");?>">




	
</head>
<body>

<!--el menu-->

	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Biblioteca CBT </a>
            </div>
            <!-- Top Menu Items -->

            
            
            <?php if ($this->session->userdata('login')==TRUE): ?>   
            <ul class="nav navbar-right top-nav">
                <!-- <li class="active">
                    <a href="#">
                      <span class="badge pull-right">42</span>  
                       Mensajes
                    </a>
                </li> -->
                <!-- para los mensajes de notificacion -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if ($this->session->userdata('entregasP')>0): ?>
                        <span class="badge pull-right"><?php echo $this->session->userdata('entregasP'); ?></span> Mensajes
                    <?php else: ?>
                        Mensajes
                    <?php endif ?>
                    
                    </a>
                    <?php if ($this->session->userdata('entregasP')>0): ?>
                         <ul class="dropdown-menu">
                           <a href="<?php echo base_url(); ?>index.php/UsuariosDeudores" class="list-group-item">
                            <h4 class="list-group-item-heading">Entregas de libros</h4>
                            <p class="list-group-item-text">Entregas pendientes <?php echo $this->session->userdata('entregasP'); ?></p>
                          </a> 
                        </ul>  
                    <?php else: ?>
                        <ul class="dropdown-menu">
                           <a href="#" class="list-group-item">
                            No hay mensajes
                          </a> 
                        </ul>  
                    
                    <?php endif ?>

                       
                </li>
                <!-- termina los mensjes de notificacion -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $this->session->userdata('Usuario'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i>Config</a>
                        </li>
                        <li class="divider"></li>-->
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Principal/closeSession"><i class="fa fa-fw fa-power-off"></i>Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php endif ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-custom">
                <ul class="nav navbar-nav side-nav navbar-custom">
                    <li  <?php if ($titulo ==='Principal'): ?>
                    	class="active"
                    <?php endif ?> >
                        <a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a>
                    </li>
                        

                    <?php if ($this->session->userdata('login')==TRUE): ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1" class="collapsed" aria-expanded="false"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Prestamos<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse" aria-expanded="false" style="height: 0px;">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/PrestamoLibro"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo Prestamo</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/UsuariosDeudores"><span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span> Usuarios deudores</a>
                            </li>
                        </ul>
                    </li>

                    <!--la parte de los inventarios-->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#esta" class="collapsed" aria-expanded="false"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Estadisticas<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="esta" class="collapse" aria-expanded="false" style="height: 0px;">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Estadisticas"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Generar</a>
                            </li>
                        </ul>
                    </li>


  
                    <li <?php if ($titulo ==='Inventario'): ?>
                    	class="active"
                    <?php endif ?> >
                        <a href="<?php echo base_url(); ?>index.php/Inventario"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Inventario</a>
                    </li>
                    <li <?php if ($titulo==="RegistroLibro"): ?>
                    	class="active"
                    <?php endif ?> >
                        <a href="<?php echo base_url(); ?>index.php/RegistroLibro"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Registro libro</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo" class="collapsed" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuario<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse" aria-expanded="false" style="height: 0px;">
                            <li>
		                        <a href="<?php echo base_url(); ?>index.php/RegistroPersona"> Registro de usuario</a>
		                    </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ListaUsuario">Lista de usuarios</a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="jumbotron" class="jumbotron"><!--page-wrapper-->
        <div class="container-fluid">
        	
        



<!--termina el menu-->
<!--todo lo de el cuerpo de la pagina-->
