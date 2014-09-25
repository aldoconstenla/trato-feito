<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/PHPMailerAutoload.php");

//Destinatário da mensagem
$destino = "aldo.constenla@gmail.com";

//Coleta dados do formulário
$empresa = utf8_decode($_POST['empresa']);
$responsavel = utf8_decode($_POST['responsavel']);
$emailusuario = utf8_decode($_POST['email']);
$telefone = utf8_decode($_POST['telefone']);
$bairro = utf8_decode($_POST['bairro']);
$cidade = utf8_decode($_POST['cidade']);
$estado = utf8_decode($_POST['estado']);
$tpcontato = utf8_decode($_POST['tipo_contato']);

//Se tipo de contato for Orçamento
$tiposerv = utf8_decode($_POST['tiposerv']);
$details = utf8_decode($_POST['details']);
$duvidas = utf8_decode($_POST['duvidas']);

//Se tipo de contato for Mensagem
$msg = utf8_decode($_POST['msg']);

$email_content = "<b>Empresa:</b> $empresa<br>";
$email_content .= "<b>Respons&aacute;vel:</b> $responsavel<br>";
$email_content .= "<b>Email:</b> $email<br>";
$email_content .= "<b>Telefone:</b> $telefone<br>";
$email_content .= "<b>Bairro:</b> $bairro <br><b>Cidade:</b> $cidade, <b>Estado:</b> $estado<br><br>";
$email_content .= "<b>Tipo de contato:</b> $tpcontato<br><br>";
if ($tpcontato == 'Mensagem') { //se for mensagem
	$email_content .= "<b>Mensagem:</b><br>$msg<br>";
} else { //se for orçamento
	$email_content .= "<b>Tipo de serviço:</b> $tiposerv<br><br>";
	$email_content .= "<b>Detalhes do or&ccedil;amento:</b><br>$details<br><br>";
	$email_content .= "<b>D&uacute;vidas:</b> <br>$duvidas<br>";
}

//Inicia classe phpmailer
$mail = new PHPMailer();

$mail->IsSMTP();

$mail->SMTPSecure = "ssl";
$mail->Port = 465;  

$mail->Host = "smtp.gmail.com";    //servidor SMTP
$mail->SMTPAuth = true; //Usa autenticação SMTP? (opcional)
$mail->Username = "joelribeiroaraujo@gmail.com";    //Usuário do servidor SMTP
$mail->Password = "999749544";  //Senha do servidor SMTP

//Define o remetente
$mail->From = $emailusuario;
$mail->FromName = $responsavel;

//Define o(s) destinatário(s)
$mail->AddAddress($destino, 'DTF');

//Define os dados técnicos da mensagem
$mail->IsHTML(true); //Define que o e-mail será enviado como HTML

//Define a mensagem (Texto e Assunto)
$mail->Subject = "$tpcontato de $responsavel"; //Assunto da mensagem
$mail->Body = $email_content;

//Envia o e-mail
$enviado = $mail->Send();

if ($enviado) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Não foi possível enviar o e-mail.";
}
 
?>