	<div class="col-md-4">
		<h3>Ultimas noticias</h3>
		<p>
			<ul>
				<li>Descuentos a docentes del Urquiza</li>
				<li>Maraton de tiempo examenes</li>
				<li>Paro docente el dia 21/09/15</li>
			</ul>
		</p>
		
		<hr>
		
		<h3>Publicidades</h3>
		
		<?php 
			foreach ($lista_publicidades as $item):
	
				echo $item->texto_html;?>
				<hr>
		
		<?php endforeach;?>
		
	</div>










