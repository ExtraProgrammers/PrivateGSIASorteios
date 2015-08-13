<?php
	include ("../classes/Querys.php");
	include ("functions.php");
	header("Content-Type: text/html; charset=ISO-8859-1",true);

	$querys = new Querys;

	if ( (isset($_POST)) && (! empty($_POST)) ) {
		if ( (isset($_POST['acc_cpf'])) && 
			(! empty($_POST['acc_cpf'])) ) {

			$account_cpf = anti_injection($_POST['acc_cpf']);

			$result = $querys->CheckValueExists('act_account_cpf', $account_cpf);

            if (isset($result['act_accounts_id'])) {
            	if ($result['act_accounts_id'] == $_POST['logged_id']) {
            		$result = '0';
            	} else {
            		$result = '1';
            	}
            }

            echo $result;

		}
	}
?>


