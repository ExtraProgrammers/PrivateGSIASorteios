<?php
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/79DF79BB-9CC7-47E7-BA0D-BC2A62F71753?email=lucasjunio2007@hotmail.com&token=69DB4051A3A644D9A7F32D8AFA54F30B';

$xml = file_get_contents($url);


$xml= simplexml_load_string($xml);

if(count($xml -> error) > 0){
//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
	print_r($xml);
	exit;
header('Location: erro.php?tipo=dadosInvalidos');
exit;
}

print_r($xml);
exit;
//header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);

?>