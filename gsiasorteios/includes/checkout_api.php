<?php
	include ("../classes/Config.php");
	include ("functions.php");
	
	$checkout = new Checkout;
	$cadastros = new Cadastros;

	if ( (isset($_POST)) && (! empty($_POST)) ) {
		if ( (isset($_POST['notificationCode'])) && 
			(! empty($_POST['notificationCode'])) ) {

			$transaction_id = anti_injection($_POST['notificationCode']);

			$content = $checkout->CheckNotification($transaction_id);


			/////////// INICIA VERIFICAÇÃO DE CRÉDITO ///////////
				$transaction_info = $vendas->getRegistro($content->code);

				if ($transaction_info['vnd_venda_entregue'] == '0') {
					if ($transaction_info['vnd_produtos_id'] == '0') {
						$cnt_credit = $transaction_info['vnd_item_count'];
					} else {
						$info = $produtos_info->getRegistro($transaction_info['vnd_produtos_id']);
						
						$cnt_credit = $info['pro_produto_credit'];	
					}

					if ($cadastros->CheckCreditExists($transaction_info['vnd_accounts_id'])) {
						$cnt_credit_act = $cadastros->GetCreditCount($transaction_info['vnd_accounts_id']);

						$cnt_credit = ($cnt_credit + $cnt_credit_act);

						$result = $cadastros->UpdateCredit($transaction_info['vnd_accounts_id'], $cnt_credit);

						if ($result) {
							$vendas->UpdateEntregue($content->code);
						}
					} else {
						$result = $cadastros->AddCredit($transaction_info['vnd_accounts_id'], $cnt_credit);

						if ($result) {
							$vendas->UpdateEntregue($content->code);
						}
					}
				}
			/////////// TERMINA VERIFICAÇÃO DE CRÉDITO ////////////

			$checkout->VerifyTransaction($content);
		}
	}
?>


