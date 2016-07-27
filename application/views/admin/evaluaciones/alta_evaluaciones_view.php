<style>



</style>


<div class="main">

	<fieldset class="module aligned ">
			<div class="form-row">
				<div>
					<label for="id_question_text" class="required">Materia:</label>
					
					<input type="text" name="question_text" maxlength="200"
						id="id_question_text" class="vTextField">
						
					<label for="id_question_text" class="required">Tema:</label>
					
					<input type="text" name="question_text" maxlength="200"
						id="id_question_text" class="vTextField">	
	
				</div>
	
			</div>
	
		</fieldset>
	<br>

	<fieldset class="module aligned ">
		<div class="form-row field-question_text">
			<div>
				<label for="id_question_text" class="required">Question text:</label>
				<input type="text" name="question_text" maxlength="200"
					id="id_question_text" class="vTextField">

			</div>

		</div>

	</fieldset>
	
<br>
	
	<div id="choice_set-group" class="inline-group">
		<div class="tabular inline-related last-related">
			<fieldset class="module">
				<h2>Respuestas</h2>

				<table>
					<thead>
						<tr>
							<th class="required" colspan="2">texto</th>
							<th class="required">¿Es correcta?</th>
							<th>Delete?</th>
						</tr>
					</thead>

					<tbody>
						<tr id="choice_set-0" class="form-row row1  dynamic-choice_set">
							<td class="original">
								<input type="hidden" name="choice_set-0-id"
								id="id_choice_set-0-id"> 
								<input type="hidden"
								name="choice_set-0-question" id="id_choice_set-0-question">
							</td>

							<td class="field-choice_text"><input type="text"
								name="choice_set-0-choice_text" maxlength="200"
								id="id_choice_set-0-choice_text" class="vTextField">
							</td>


							<td class="field-votes"><input type="text" value="0"
								name="choice_set-0-votes" id="id_choice_set-0-votes"
								class="vIntegerField">
							</td>

							<td class="delete"></td>

						</tr>
						
						<tr id="choice_set-0" class="form-row row1  dynamic-choice_set">
							<td class="original">
								<input type="hidden" name="choice_set-0-id"
								id="id_choice_set-0-id"> 
								<input type="hidden"
								name="choice_set-0-question" id="id_choice_set-0-question">
							</td>

							<td class="field-choice_text"><input type="text"
								name="choice_set-0-choice_text" maxlength="200"
								id="id_choice_set-0-choice_text" class="vTextField">
							</td>


							<td class="field-votes"><input type="text" value="0"
								name="choice_set-0-votes" id="id_choice_set-0-votes"
								class="vIntegerField">
							</td>

							<td class="delete"></td>

						</tr>

						<tr class="add-row">
							<td colspan="4"><a href="javascript:void(0)">Add another Choice</a></td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			
		</div>
	</div>


</div>
<!-- main -->



