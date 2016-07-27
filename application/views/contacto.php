<div class="col-md-8">
	<h1>Contacto</h1>
	<hr>
	
	<script type="text/javascript">

		function submitForm(){
			if (validateForm()){
				$.ajax({
			        type: 'POST',
			        url: $( "#formContacto" ).attr('action'),
			        dataType: "json",
			        data: $( "#formContacto" ).serialize(),
			        success: function (data){


			        	console.log(data.status);
						
						if (data.status == 0){

							$("#message").show();

						}
			        	
			        },
			      });

			}

		}


		function validateForm(){
			// hacer validaciones de campos
			return true;
		}


	</script>
	
	<div class="">
          	<?php echo form_open('contacto/send_info', array('class' => 'pure-form pure-form-stacked', 'id' => 'formContacto'));?>

		        <input name="nombre" type="text" placeholder="Nombre" autofocus>
		        <input name="apellido" type="text" placeholder="Apellido">
		        <input name="email" type="email" size="30" placeholder="Email">
			    <textarea name="comentario" class="pure-input-1-2 comentario" placeholder="Comentario"></textarea>
				<br>
				
				<label id="message" style="display: none;"> Gracias por conctactarnos</label>
		        
		        <button type="button" onclick="submitForm();" class="pure-button pure-button-primary">Enviar</button>

			<?php echo form_close();?>
     </div>
    
</div>

