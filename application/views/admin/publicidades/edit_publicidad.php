	<!-- <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script> -->
	
	<script src="<?php echo base_url()?>public/libs/tinymce/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript">
		tinymce.init({
		    selector: "textarea",
		    theme: "modern",
		    plugins: [
		        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		        "searchreplace wordcount visualblocks visualchars code fullscreen",
		        "insertdatetime media nonbreaking save table contextmenu directionality",
		        "emoticons template paste textcolor colorpicker textpattern imagetools"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    toolbar2: "print preview media | forecolor backcolor emoticons",
		    image_advtab: true,
		    templates: [
		        {title: 'Test template 1', content: 'Test 1'},
		        {title: 'Test template 2', content: 'Test 2'}
		    ]
		});
	</script>
	
	<br>
	<div id="message" style="color: red;">mensaje</div>
	<br>
	
	<form method="post" action="somepage" id="form-publicidad">
	    
	    <input type="hidden" name="id_publicidad" value="<?php echo $pub->id_publicidad?>">
	    Nombre: <input type="text" name="nombre" value="<?php echo $pub->nombre?>">
	    
	    <br>
	    <br>
	    <br>
	    <br>  
	    
	    
	    <textarea name="texto_html" style="width:100%">
	    	<?php echo $pub->texto_html?>
	    
	    </textarea>
	    
	    
	</form>
	<br>
	<br>
	
	<input type="button" id="guardar-publicidad-button" value="guardar">
	<a href="<?php echo base_url()?>/index.php/Admin/publicidades">Volver</a>
	
	
	
	<script type="text/javascript">

		//guardar-publicidad-button
		
		$("#guardar-publicidad-button").click(function (){
			tinyMCE.triggerSave();
			Publicidad.updatePublicidad();
			
		});
		

	</script>




	