<?php

// 

function calcular_puntaje($preguntas_usuario_correctas, $preg_selecc_with_resp)
{
	
	$puntaje = 0;
	$cantidad_correctas = 0;
	$cantidad_total = count($preguntas_usuario_correctas);
	
// 	echo "cantidad preguntas: " + $cantidad_total;
	
	foreach ($preguntas_usuario_correctas as $preg){
		
		$respuestas_correctas = array();
		$respuestas_seleccionadas = array();
		
		
		foreach ($preg['respuestas'] as $resp){
			if ($resp['es_correcta'] == 'S')
			{
				$respuestas_correctas[] = $resp['id_respuesta'];
			}
		}
		
		$respuestas_seleccionadas = $preg_selecc_with_resp['preguntas'][$preg['id_pregunta']];
		
		if (es_pregunta_correcta(1, $respuestas_correctas, $respuestas_seleccionadas))
		{
			// sumo un punto por cada respuesta correcta
			$cantidad_correctas++;
			
		}
		
	}
	
	
	echo "preguntas correctas: " . $cantidad_correctas;
	
	$puntaje = $cantidad_correctas / $cantidad_total;
	
	return $puntaje;
	
	
}

function es_pregunta_correcta($id_tipo_evaluacion=1, $respuestas_correctas, $respuestas_seleccionadas)
{
	
	$es_correcta = false;
	
	// si es respuesta unica
	if ($id_tipo_evaluacion ==1)
	{
		
		if (count($respuestas_correctas) != count($respuestas_seleccionadas))
		{
			// array distinta longitud
			// incorrecta
			$es_correcta = false;
		}
		else 
		{		
			$diff = array_diff($respuestas_correctas, $respuestas_seleccionadas);
			
			if (count($diff) == 0)
			{
// 				echo "correcta_diff";
				$es_correcta = true;
			}
			else
			{
				$es_correcta = false;
			}
		}
	
	}
	
	
	
	return $es_correcta;
	
	
}