<style>

	.table-respuesta{
		border: none;
	}
	
	.table-respuesta td {
    	border-bottom: 0px solid #ddd;
    	padding: 0 3em 0.5em 0em;
    	text-align: left;
    	vertical-align: middle;
	}
	
	.table-respuesta th {
    	border-bottom: 0px solid #ddd;
    	padding: 0 0 0.5em 0em;
    	text-align: left;
    	vertical-align: middle;
	}

	.table-element {
		padding: 10px;
	
	}



</style>

<script type="text/javascript">

	
	function add_respuesta(){

		var id_tbody = "table-respuesta tbody";
		
		var count = $("#table-respuesta tbody tr").size();
		var row = $("#row-respuesta-temp").html();
		var row_tr = "<tr id='row-respuesta-" + count + "'>" + row + "</tr>";

		$("#"+id_tbody).append(row_tr);

		
		if ($("#field-id_tipo_evaluacion").val() == 1){
			// radio
			$("#row-respuesta-"+ count +" input").attr("name","es_correcta");
			$("#row-respuesta-"+ count +" input").attr("value", count);

		}else {
			// check
			$("#row-respuesta-"+ count +" input").attr("name","es_correcta_" + count);

			

		}

		
		$("#row-respuesta-"+ count +" textarea").attr("name","respuesta_" + count);
		$("#row-respuesta-"+ count +" a").attr("onclick","delete_row("+count +")");

		console.log($("#row-respuesta-"+ count +"a"));

	}
	


	function delete_row(id_row) {

		$("#row-respuesta-" + id_row).remove();


	}


	$(function (){

		// oculto el campo respuesta
		$("#respuesta_field_box").hide();
		
		// 1 - radiobutton
		// 2 - checkbox
		var tipo_input = "checkbox";

		
		// change para el combo tipo evaluacion
		$("#field-id_tipo_evaluacion").change(function (){

			var id = $("#field-id_tipo_evaluacion").val();

			// 1 - radio
			// 2 - checkbox
			
			if (id == 1){
				var i = 0;
				$("#table-respuesta tr input").each(function (){
					$(this).attr("type", "radio");
					$(this).attr("value", i);
					$(this).attr("name", "es_correcta");
					i++;
					
				});
				
			}else {
				var i = 0;
				$("#table-respuesta tr input").each(function (){
					$(this).attr("type", "checkbox");
					$(this).attr("value", "s");
					$(this).attr("name", "es_correcta_" + i);
					i++;
					
				});
				
			}
			
			$("#respuesta_field_box").show();

		});


		

	});




</script>


<div id="respuestas-content" class="">
	
	
	<table id="table-respuesta" class="table-respuesta">
		
		<thead>
			<tr>
				<th >Texto</th>
				<th width="130px;">¿es correcta?</th>
				<th>borrar</th>
			</tr>
		</thead>
		
		<tbody>
			<tr id="row-respuesta-temp" style="display: none;">
				<td>
					<div>
						<textarea id="field-respuesta"></textarea>
					</div>
				</td>
				
				<td>
					<div>
						<input type="checkbox" name="" value="s">
					</div>
				</td>
				
				<td>
					<div>
						<a class="delete-row" title="Eliminar Respuesta">
							<span class="delete-icon"></span>
						</a>
					</div>
				
				</td>
			
			</tr>
		
		
			<tr id="row-respuesta-1">
				<td>
					<div id="respuesta_input_box_1" class="">
						<textarea name="respuesta_1" id="field-respuesta"></textarea>
					</div>
				</td>
				
				<td>
					<div>
						<input type="checkbox" name="es_correcta_1" value="s">
					</div>
				</td>
				
				<td>
					<div>
						<a class="delete-row" title="Eliminar Respuesta" onclick="delete_row('1')">
							<span class="delete-icon"></span>
						</a>
					</div>
				
				</td>
			
			</tr>
			
			<tr id="row-respuesta-2">
				<td>
					<div id="respuesta_input_box_2" class="">
						<textarea name="respuesta_2" id="field-respuesta"></textarea>
					</div>
				</td>
				
				<td>
					<div>
						<input type="checkbox" name="es_correcta_2" value="s">
					</div>
				</td>
				
				<td>
					<div>
						<a class="delete-row" title="Eliminar Respuesta" onclick="delete_row('2')">
							<span class="delete-icon"></span>
						</a>
					</div>
				
				</td>
			
			</tr>
		</tbody>
	</table>

</div>


<div class="fbutton">
	<div>
		<span onclick="add_respuesta()" class="add">Añadir Respuesta</span>
	</div>
</div>

