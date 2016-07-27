<script type="text/javascript" src="<?php echo base_url();?>public/js/login.js"></script> 

	<div class="col-md-8">
	
	<h1>Ingresar</h1>
	<hr>


	<form class="pure-form pure-form-stacked" 
		action="<?php echo base_url();?>index.php/Login/access" method="post">


		<?php if (isset($error) && $error): ?>
        	<div class="alert alert-error">
				<div style="color: red;"> × Nombre de usuario o contrase&ntilde;a incorrecto!</div>
				<br>
			</div>
     	<?php endif; ?>
		
		
		<input id="username" name="username" type="text" placeholder="Usuario" required autofocus> 
		
		<input id="password" name="password" type="password" placeholder="Contraseña" required> 
		
		<label for="remember" class="pure-checkbox"> 
			<input id="remember" type="checkbox"> Recordarme
		</label>

		<button type="submit" class="pure-button pure-button-primary">Ingresar</button>
	
	</form>


	<div style="clear: both;">&nbsp;</div>
	
	</div>



