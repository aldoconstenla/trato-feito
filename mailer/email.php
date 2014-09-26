<?php

//recebe Variaveis
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

$destino = "aldo.constenla@gmail.com";

//Inclui arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/PHPMailerAutoload.php");

//Inicia classe phpmailer
$mail = new PHPMailer();

//Define os dados do servidor e tipo de conexão
$mail->IsSMTP();

$mail->SMTPSecure = "ssl";
$mail->Port = 465;  

$mail->Host = "smtp.gmail.com";    //servidor SMTP
$mail->SMTPAuth = true; //Usa autenticação SMTP? (opcional)
$mail->Username = "joelribeiroaraujo@gmail.com";    //Usuário do servidor SMTP
$mail->Password = "999749544"; 	//Senha do servidor SMTP

//Define o remetente
$mail->From = $email;
$mail-> FromName = $nome;

//Define o(s) destinatário(s)
$mail->AddAddress($destino, 'DTF');

//Define os dados técnicos da mensagem
$mail->IsHTML(true); //Define que o e-mail será enviado como HTML

//Define a mensagem (Texto e Assunto)
$mail->Subject = "Mensagem do site"; //Assunto da mensagem
$mail->Body = $mensagem;

//Envia o e-mail
$enviado = $mail->Send();

//Exibe uma mensagem de resultado
if ($enviado) {
	echo "E-mail enviado com sucesso";
} else {
	echo "Não foi possível enviar o e-mail.";
}

?>