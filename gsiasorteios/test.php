	<?php
	include ('header.php');
	$checkout = new Checkout;

	$data = array(	'pro_produtos_id' 		=>	'0002',
					'pro_produto_nome'		=> 	utf8_encode('Testando Integração Completa'),
					'pro_produto_valor'		=>	'5',
					'produto_count'			=> 	'5',
					'act_accounts_id'		=>	'1',
					'act_account_nome'		=> 	'Lucas',
					'act_account_sobrenome'	=> 	'Junio Lana Santana',
					'act_account_telefone1' => 	'96985042',
					'act_account_email'		=>	'checkout@sandbox.pagseguro.com.br',
					'act_account_cpf'		=> 	'12925681603',
					'act_account_rua'		=> 	'asdasdasd',
					'act_account_numero'	=>	'84',
					'act_account_bairro'	=> 	'Centro'
				);

	$checkout->SendPayment($data);
?>