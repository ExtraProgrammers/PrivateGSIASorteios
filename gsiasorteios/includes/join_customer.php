<?php
	include ("../classes/Config.php");
	include ("functions.php");
	header("Content-Type: text/html; charset=ISO-8859-1",true);

	$querys = new Participantes;

	if ( (isset($_POST)) && (! empty($_POST)) ) {
		if ( (isset($_POST['act_accounts_id'])) && 
			(! empty($_POST['act_accounts_id'])) &&
				(isset($_POST['sor_sorteios_id'])) && 
					(! empty($_POST['sor_sorteios_id'])) ) {

			$account_id = anti_injection($_POST['act_accounts_id']);
			$sorteio_id = anti_injection($_POST['sor_sorteios_id']);

			$result = $querys->CheckUserSorteio($account_id, $sorteio_id);

            if ($result == '0') {
            	if ($querys->addRegistro(array('par_accounts_id' => $account_id, 'par_sorteios_id' => $sorteio_id)) == '1') {
            		$result = '1';
            	} else {
            		$result = '0';
            	}
            } else {
            	$result = '2';
            }

            print_r($result);
  			exit();
		}
	}
?>


