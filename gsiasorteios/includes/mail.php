<?php

	include("phpmailer/class.phpmailer.php");
	//instancia a objetos
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->SetLanguage("br", "phpmailer/language/");
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	$mail->Username = "lucas.170696@gmail.com"; 
	$mail->Password = "ogcardrdr"; // senha
	$mail->From = "lucas.170696@gmail.com";
	$mail->FromName = "Lucas Junio";

	//Enderecos que devem ser enviadas as mensagens
	$mail->AddAddress("lucas.170696@gmail.com","RETORNO");
	//$mail->AddAddress("outroEmail@SEUDOMINIO.com.br","Contato");

	//wrap seta o tamanhdo do texto por linha
	$mail->WordWrap = 50; 
	//anexando arquivos no email
	//$mail->AddAttachment("anexo/arquivo.zip"); 
	//$mail->AddAttachment("imagem/foto.jpg");
	//$mail->IsHTML(true); //enviar em HTML

	// recebendo os dados od formulario
	if(isset($_GET['nome'])){
		$nome     = ucwords($_GET['nome']);
		$email 	  = $_GET['email'];
		$mensagem   = $_GET['mensagem'];
	    // informando a quem devemos responder 
		//ou seja para o mail inserido no formulario
		$mail->AddReplyTo("$email","$nome");
		//criando o codigo html para enviar no email
		//vocepode utilizar qualquer tag html ok
		$msg  = "";
		$msg .= "<b> Nome:</b> $nome<br>\n";
		$msg .= "<b> E-mail:</b> $email<br>\n";
		$msg .= "<b> Mensagem:</b> $mensagem<br>\n";
	 }

	$mail->Subject = "ASSUNTO DO EMAIL";
	//adicionando o html no corpo do email
	$mail->Body = $msg;	

	// Envia o e-mail
	$enviado = $mail->Send();

	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();

	// Exibe uma mensagem de resultado
	if ($enviado) {
	  echo "E-mail enviado com sucesso!";
	} else {
	  echo "Não foi possível enviar o e-mail.";
	  echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
	}
?>
