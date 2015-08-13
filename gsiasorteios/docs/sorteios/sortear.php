<?php
	include ("../../classes/Config.php");
	include ("../../includes/functions.php");

	header("Content-Type: text/html; charset=ISO-8859-1",true);

	$querys = new Ganhadores;

	if ( (isset($_GET)) && (! empty($_GET)) ) {
		if ( (isset($_GET['sor_sorteios_id'])) && 
			(! empty($_GET['sor_sorteios_id'])) &&
				(is_numeric($_GET['sor_sorteios_id'])) ) {

			$sor_sorteios_id = anti_injection($_GET['sor_sorteios_id']);

			$sorteio_status = $sorteios->getValue('sor_sorteio_status', $_GET['sor_sorteios_id']);
			
			$date_counter = $sorteios->getValue('sor_sorteio_data', $_GET['sor_sorteios_id']);
			$date_counter = GetTimeInterval(date('d/m/Y H:i:s', strtotime($date_counter)));
	
			if ( ($sorteio_status == '0') && ($date_counter['days'] == '00') && ($date_counter['hours'] == '00') ){
				$result = $querys->CheckGanhador($sor_sorteios_id);

	            if ($result == 0) {
	            	$count_sorteios = $participantes->getCountSorteios($_GET['sor_sorteios_id']);

	            	$data = array('count' => count($count_sorteios));

	            	$ganhador_id = $count_sorteios[GerarSorteio($data)]['par_accounts_id'];

	            	$data = array(
	            					'gan_accounts_id'		=> $ganhador_id,
	            					'gan_sorteios_id' 		=> $_GET['sor_sorteios_id'],
	            					'gan_data_registro' 	=> ''
	            				);

	            	if ($ganhadores->addRegistro($data)) {
	            		$result = $querys->CheckGanhador($sor_sorteios_id);	
	            		$sorteios->ConfirmSorteio($_GET['sor_sorteios_id']);
	            	}	
	            } else {
	            	$result = $querys->CheckGanhador($sor_sorteios_id);
	            }

	            echo json_encode($result);
	        } else {
	        	$result = $querys->CheckGanhador($sor_sorteios_id);

	        	if ($result != 0) {
	        		$result = $querys->CheckGanhador($sor_sorteios_id);
	        	}

	        	echo json_encode($result);
	        }      
		} else {
			echo 'ERROR';
		}
	}
?>


