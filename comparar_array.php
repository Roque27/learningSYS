<?php
	
	$a_resp_correctas = array(2,3,1);
	$a_resp_selecc = array(1,3,2);

	$is_corr = es_correcta($a_resp_correctas, $a_resp_selecc);

	echo "\r\ncorrecta: " . $is_corr;

	function es_correcta($a,$b)
	{
		if (count($a) != count($b))
		{
			// array distinta longitud
			// incorrecta
			return 'N';
		}
		
		$diff = array_diff($a, $b);

		if (count($diff) == 0) 
		{
			return 'S';
		}
		else 
		{
			return 'N';
		}
	}
	

	




?>
