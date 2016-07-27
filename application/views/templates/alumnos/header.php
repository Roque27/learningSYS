<?php $this->load->view('templates/admin/head'); ?>

<body>
<div id="wrapper" class="wrapper-admin">
	<div class="header">
		<div class="container">
			
			<h2 class="header-heading"> 
				<i class="fa fa-file-text"></i>&nbsp;&nbsp;&nbsp;Instituto de capacitaci&oacute;n&nbsp;&nbsp;[Nombre]</h2>
		</div>
	</div>
	
	<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand brand-head" href="#"> Men&uacute; learningSYS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
			<li class="<?php echo ($this->uri->segment(2)==='welcome')?'active':''?>" >
				<a href="<?php echo base_url();?>index.php/Alumnos">Inicio</a>
			</li>		
        
        <?php 
				
			if ($lista_recursos){
				foreach ($lista_recursos as $recurso):?>
				
				<li class="<?php echo ($this->uri->segment(2)===$recurso->nombre_recurso)?'active':''?>" >
				
				<a href="<?php echo base_url() . $recurso->url_recurso;?>">
					<?php echo $recurso->titulo_recurso;?>
				</a>
				
				</li>
				
			
			<?php endforeach;}
		
		?>
        
        
<!--         <li class="dropdown"> -->
<!--           <a href="#" class="dropdown-toggle" data-toggle="dropdown"  -->
<!--           	role="button" aria-haspopup="true"  -->
<!--           	aria-expanded="false">Dropdown <span class="caret"></span></a> -->
          
<!--           <ul class="dropdown-menu"> -->
<!--             <li><a href="#">Action</a></li> -->
<!--             <li><a href="#">Another action</a></li> -->
<!--             <li><a href="#">Something else here</a></li> -->
<!--             <li role="separator" class="divider"></li> -->
<!--             <li><a href="#">Separated link</a></li> -->
<!--             <li role="separator" class="divider"></li> -->
<!--             <li><a href="#">One more separated link</a></li> -->
<!--           </ul> -->
<!--         </li> -->
        
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" 
          		data-toggle="dropdown" role="button" 
          		aria-haspopup="true" aria-expanded="false">
          		<?php echo $nombre_rol?> 
          		<span class="caret"></span>
          </a>
          
          <ul class="dropdown-menu">
            <li><a href="#"><?php echo $username;?></a></li>
            <li><a href="<?php echo base_url();?>index.php/Logout">Salir</a></li>
<!--             <li><a href="#">Something else here</a></li> -->
<!--             <li role="separator" class="divider"></li> -->
<!--             <li><a href="#">Separated link</a></li> -->
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
	
	
	
	
	
	<div class="content">
	<div class="container">


	<div class="row">
