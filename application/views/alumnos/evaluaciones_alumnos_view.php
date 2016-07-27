<script type="text/javascript">

	var url_base = "<?php echo base_url();?>";

	function getTemas(id_materia){

		$.get(url_base + "index.php/Alumnos/Examen/getTemas/" + id_materia, function (data) {

			$("#select_temas").html("<option value='-1'>----</option>");
			
			$.each(data, function (key, value){
				$("#select_temas").append('<option value=' + key + '>' + value + '</option>');
			});
        });

	}

	function submitForm(){


		$("#alert_materia").css("display","none");
		$("#alert_tema").css("display","none");


		var isValid = true;
		
		if ($("#select_materia").val() == -1){
			$("#alert_materia").css("display","inline");
			isValid = false;
		}

		if ($("#select_temas").val() == -1){
			$("#alert_tema").css("display","inline");
			isValid = false;
		}

		if (isValid){
			$("#form_generar_evaluacion").submit();
		}

		


		

	}
	

	$(function (){

		var id_materia = $("#select_materia").val()
		
		if ( id_materia != -1){
			getTemas(id_materia);
		}
		
		$("#select_materia option").click(function (){
			
			var id_materia = $(this).val();
			getTemas(id_materia);

		});
		

	});

</script>

<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">

		<form id="form_generar_evaluacion" name="form_generar_evaluacion" method="post"
			action="<?php echo base_url()?>index.php/Alumnos/Examen/generar_evaluacion">

			<div class="form-group ">
				
				<label class="control-label requiredField" for="select"> 
					Materia *<span id="alert_materia" style="color: #DD1144;display: none;"> Materia es obligatorio</span> 
				</label> 
				
				
				<select class="select form-control required" id="select_materia"
					name="id_materia">
					<option value="-1">----</option>
					<?php foreach ($materias as $materia): ?>
					<option value="<?=$materia->id_materia?>"><?=$materia->nombre_materia?></option>
					<?php endforeach;?>
				</select>
				

			</div>

			<div class="form-group ">
				<label class="control-label " for="select1">
					Tema * <span id="alert_tema" style="color: #DD1144;display: none;"> Tema es obligatorio</span>
				</label>
				
				

				<select class="select form-control" id="select_temas" name="id_tema">
					<option value="-1">----</option>
				</select>

			</div>

			<div class="form-group">
				<div>
					<input name="_honey" style="display: none" type="text" />
					<button class="btn btn-primary " name="" onclick="submitForm();" type="button"> Comenzar</button>
				</div>
			</div>

		</form>
	</div>
</div>

