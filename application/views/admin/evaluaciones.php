<div class="main">
	<form class="pure-form">

		<table style="border: 0;">
			<tr>
				<td>
					<label for="materia">Materia:</label> 
					<select id="materia">
						<option >matematica</option>
						<option>fisica</option>
						<option>Quimica</option>
					</select>
				</td>

				<td>
					<label for="tema">Tema:</label> 
					<select id="tema">
						<option>A</option>
						<option>B</option>
						<option>C</option>
					</select>
				</td>
			</tr>
		</table>
		<br>

		<fieldset>
			<div>
				<div>
					
					<label for="id_question_text" class="required">Pregunta:</label>
					<input type="text" name="pregunta" size="50" />
				</div>
			</div>
		</fieldset>


		<br>


<!-- tabla respuestas -->
			<table >
				<thead>
					<tr>
						<th>Respuesta</th>
						<th>Es correcta?</th>
						<th>Borrar?</th>
					</tr>
				</thead>

				<tbody>

					<tr class="">
						<td>
							<textarea cols="" rows="" style="width: 456px; height: 92px;"></textarea>
						</td>

						<td>
							<label for="option-one" class="pure-checkbox"> 
								<input id="option-one" type="checkbox" value="">
							</label>
						</td>

						<td>
							<label for="option-one" class="pure-checkbox"> 
								<input id="option-one" type="checkbox" value="">
							</label>
						</td>
					</tr>
					
					<tr class="">
						<td>
							<textarea cols="" rows="" style="width: 456px; height: 92px;"></textarea>
						</td>

						<td>
							<label for="option-one" class="pure-checkbox"> 
								<input id="option-one" type="checkbox" value="">
							</label>
						</td>

						<td>
							<label for="option-one" class="pure-checkbox"> 
								<input id="option-one" type="checkbox" value="">
							</label>
						</td>
					</tr>

				</tbody>
			</table>


		<!-- fin tabla respuestas -->

		<br>
		<br>		
		<div class="pure-controls">
			<button type="submit" class="pure-button pure-button-primary">Guardar</button>
		</div>
	</form>





</div>

