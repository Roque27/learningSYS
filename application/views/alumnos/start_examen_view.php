<script type="text/javascript">

$(function (){

	var time_minutes = 60 * 5,
    display = $('#clock');
	startTimer(time_minutes, display);		
	
});


function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}


</script>


<?php //print_r($viewdata)?>


<div class="row">
	<div class="col-md-10">

		<br> <br>

		<form id="form-evaluacion" class="form-horizontal" method="POST"
			action="<?=base_url();?>index.php/Alumnos/Examen/evaluar">
		
		<?php foreach ($viewdata['preguntas'] as $preg){ ?>
		
		<?php $key_p = $preg['id_pregunta'];?>
		
		<fieldset>

				<!-- Form Name -->
				<legend><?=$preg['pregunta']; ?></legend>
			
	
			<?php if ($preg['id_tipo_evaluacion'] == 1): ?>
				<!-- Multiple Radios -->
				<div class="form-group">
					<div class="col-md-4">
						
						<?php foreach ($preg['respuestas'] as $resp){?>
						
						<?php $key_r = $resp['id_respuesta']?>
						
						<div class="radio">
							<label for="radios-<?=$key_p . $key_r?>"> <input
								name="key_pregunta_<?=$key_p?>"
								id="key_pregunta-<?=$key_p . $key_r?>" value="<?=$key_r?>"
								type="radio"> 
									<?=$resp['respuesta'];?>
							</label>
						</div>
						
						<?php }?>
					
					</div>
				</div>
			
			
			<?php else: ?>
				
				<!-- Multiple Checkboxes -->
				<div class="form-group">
					<div class="col-md-4">
						<?php foreach ($preg['respuestas'] as $key_r=>$resp):?>
						
						<?php 
							$name = "key_pregunta_" . $key_p . "key_respuesta_" . $key_r;
							$id = $key_p . $key_r;
						?>
						
						<div class="checkbox">
							<label for="checkboxes-<?=$id?>"> 
								<input name="<?=$name?>" id="checkboxes-<?=$id?>" value="1" type="checkbox"> 
									<?=$resp['respuesta'];?>
							</label>
						</div>
 						<?php endforeach; ?>
					</div>
				</div>
			
				
			
			
			 <?php endif; ?>
			
			<br>
			
		</fieldset>
		
		<?php }?>
		
		
		<br> <br>

			<fieldset>

				<legend></legend>
				<div class="form-group">
					<div>
						<button class="btn btn-primary " name="submit" type="submit">
							Finalizar</button>
					</div>
				</div>
			</fieldset>






		</form>

	</div>

	<div class="col-md-2">
		<span id="ichora"></span> <span style="color: red;" id="clock"></span>


	</div>



</div>


