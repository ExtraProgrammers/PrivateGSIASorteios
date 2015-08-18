<?php

class Checkout 
{
			
  	function SendPayment($data = array()) 
  	{		
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';


		$data['email'] = 'gustavo8477@hotmail.com';
		$data['token'] = '9F7DFEF2007A4F1C965A6AB239D6F1C5';
		$data['currency'] = 'BRL';
		$data['itemId1'] = $data['pro_produtos_id'];
		$data['itemDescription1'] = $data['pro_produto_nome'];
		$data['itemAmount1'] = $data['pro_produto_valor'] . '.00';
		$data['itemQuantity1'] = $data['produto_count'];
		$data['reference'] = $data['act_accounts_id'];
		$data['senderName'] = utf8_decode($data['act_account_nome'] . ' ' . $data['act_account_sobrenome']);
		$data['senderAreaCode'] = '99';
		$data['senderPhone'] = '99999999';
		$data['senderEmail'] = $data['act_account_email'];
		$data['senderCPF'] = $data['act_account_cpf'];
		$data['shippingType'] = '3';
		$data['shippingAddressStreet'] = utf8_decode($data['act_account_rua']);
		$data['shippingAddressNumber'] = $data['act_account_numero'];
		$data['shippingAddressComplement'] = '--';
		$data['shippingAddressDistrict'] = utf8_decode($data['act_account_bairro']);
		$data['shippingAddressPostalCode'] = '76380000';
		$data['shippingAddressCity'] = 'Goianesia';
		$data['shippingAddressState'] = 'GO';
		$data['shippingAddressCountry'] = 'BRA';
		$data['redirectURL'] = DIR_BASE . 'includes/obrigado.php';
		$data['notificationURL'] =  DIR_BASE . 'includes/checkout_api.php';
		$data = http_build_query($data);

		$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$xml= curl_exec($curl);

		if($xml == 'Unauthorized'){
			//Insira seu código de prevenção a erros
			print_r($xml);
			//header('Location: erro.php?tipo=autenticacao');
			exit; //Mantenha essa linha
		}

		curl_close($curl);

		$xml = simplexml_load_string($xml);

		if(count($xml -> error) > 0){
		//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
			print_r($xml);
			exit;
		header('Location: erro.php?tipo=dadosInvalidos');
		exit;
		}

		echo "<script>document.location.href='https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=" . $xml -> code . "';</script>";	
	}
	
	function CheckTransaction($vnd_transaction_id) 
	{
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/' . $vnd_transaction_id . '?email=gustavo8477@hotmail.com&token=9F7DFEF2007A4F1C965A6AB239D6F1C5';

		$content = file_get_contents($url);	

		if($content == 'Unauthorized'){
			//Insira seu código de prevenção a erros
			print_r($xml);
			//header('Location: erro.php?tipo=autenticacao');
			exit; //Mantenha essa linha
		}

		$xml = simplexml_load_string($content);

		return $xml;
	}

	function CheckNotification($vnd_transaction_id) 
	{
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/' . $vnd_transaction_id . '?email=gustavo8477@hotmail.com&token=9F7DFEF2007A4F1C965A6AB239D6F1C5';

		$content = file_get_contents($url);	

		if($content == 'Unauthorized'){
			//Insira seu código de prevenção a erros
			print_r($xml);
			//header('Location: erro.php?tipo=autenticacao');
			exit; //Mantenha essa linha
		}

		$xml = simplexml_load_string($content);
		
		return $xml;
	}

	function VerifyTransaction($data = array()) {
		$vendas = new Vendas;

		$data_new = array(	'vnd_accounts_id' 		=> 	$data->reference,
							'vnd_transaction_id' 	=>	$data->code,
							'vnd_status'			=> 	$data->status,
							'vnd_type_payment'		=> 	$data->paymentMethod->type,
							'vnd_payment_link'		=> 	$data->paymentLink,
							'vnd_item_count'		=> 	$data->items->item->quantity,
							'vnd_produtos_id'		=>	$data->items->item->id,
							'vnd_valor'				=> 	$data->grossAmount
						);

		if ($vendas->CheckVendaExists($data_new['vnd_transaction_id'])) {
			$vendas->EditRegistro($data_new['vnd_transaction_id'], $data_new);
		} else {
			$vendas->AddRegistro($data_new);
		}
	}
}
?>
