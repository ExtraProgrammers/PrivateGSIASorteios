<?php
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';


$data['email'] = 'lucasjunio2007@hotmail.com';
$data['token'] = '69DB4051A3A644D9A7F32D8AFA54F30B';
$data['currency'] = 'BRL';
$data['itemId1'] = '0001';
$data['itemDescription1'] = 'Teste Integracao';
$data['itemAmount1'] = '2.00';
$data['itemQuantity1'] = '3';
$data['reference'] = '12925681603';
$data['senderName'] = 'Jose Comprador';
$data['senderAreaCode'] = '11';
$data['senderPhone'] = '56273440';
$data['senderEmail'] = 'comprador@sandbox.pagseguro.com.br';
$data['senderCPF'] = '12925681603';
$data['shippingType'] = '3';
$data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
$data['shippingAddressNumber'] = '1384';
$data['shippingAddressComplement'] = '5o andar';
$data['shippingAddressDistrict'] = 'Jardim Paulistano';
$data['shippingAddressPostalCode'] = '01452002';
$data['shippingAddressCity'] = 'Sao Paulo';
$data['shippingAddressState'] = 'SP';
$data['shippingAddressCountry'] = 'BRA';
$data['redirectURL'] = 'http://gsiasorteios.com.br/site/';

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

$xml= simplexml_load_string($xml);

if(count($xml -> error) > 0){
//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
	print_r($xml);
	exit;
header('Location: erro.php?tipo=dadosInvalidos');
exit;
}

header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);

?>