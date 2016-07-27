<?php $this->load->view('templates/head'); ?>

<body>
<div id="wrapper" class="wrapper">
	
<div class="header">
	<div class="container">
		
		<h2 class="header-heading"> 
			<i class="fa fa-file-text"></i>&nbsp;&nbsp;&nbsp;Instituto de capacitaci&oacute;n&nbsp;&nbsp;[Nombre]</h2>

		<!-- HTML for SEARCH BAR -->
		<div id="tfheader" style="margin-top: -30px;">

			<form id="tfnewsearch" method="get" action="">
				<input type="text" id="tfq" class="tftextinput2" name="q" size="35"
					maxlength="120" placeholder="Buscar..."/><input type="submit" value=">"
					class="tfbutton2" />
			</form>

			<div class="tfclear"></div>

		</div>


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
        
        <li class="<?php echo ($this->uri->segment(1)===false)?'active':'' ?>"><a href="<?php echo base_url();?>">Inicio</a></li>
				
		<li class="<?php echo ($this->uri->segment(1)==='nosotros')?'active':''?>" ><a href="<?php echo base_url();?>index.php/nosotros">Quiénes
				somos</a></li>
		<li class="<?php echo ($this->uri->segment(1)==='servicios')?'active':''?>" ><a href="<?php echo base_url();?>index.php/servicios">Qué
				hacemos</a></li>
		<li class="<?php echo ($this->uri->segment(1)==='contacto')?'active':''?>" ><a href="<?php echo base_url();?>index.php/contacto">Contacto</a></li>
	
		
        
<!--         <li class="dropdown"> -->
<!--           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
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
        <?php if ($isLoggedIn): ?>
			<li style="float: right;"><a href="<?php echo base_url();?>index.php/Admin">Admin</a></li>
							
		<?php else: ?>
   				<li style="float: right;"><a href="<?php echo base_url();?>index.php/Login">Ingresar</a></li>
		<?php endif; ?>
<!--         <li class="dropdown"> -->
<!--           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
<!--           <ul class="dropdown-menu"> -->
<!--             <li><a href="#">Action</a></li> -->
<!--             <li><a href="#">Another action</a></li> -->
<!--             <li><a href="#">Something else here</a></li> -->
<!--             <li role="separator" class="divider"></li> -->
<!--             <li><a href="#">Separated link</a></li> -->
<!--           </ul> -->
<!--         </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
	<div class="content">
	<div class="container">
	
	
		<div class="row">
	
	