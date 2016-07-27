<div class="main">
	<h1>Test</h1>
	<hr>


<?php echo 'USUARIO:';?><br >
<?php echo $nombre_usuario;?><br ><br >
<?php echo 'NOMBRE Y APELLIDO:';?><br >
<?php echo $nombre;?>&nbsp;<?php echo $apellido;?><br ><br >
<?php echo 'ROL:';?><br >
<?php echo $nombre_rol;?><br ><br >
<?php echo 'RECURSOS POR ROL:';?><br ><br >
<?php 
		foreach ($lista_recursos as $recurso):
			echo $recurso->nombre_recurso;
			echo $recurso->alta;?>
			<hr>
	<?php endforeach;?>
</div>


