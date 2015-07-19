<?php
	require_once("Phpmailer.class.php");
	require_once("mail_config.php");
?>
<?php

function sendMail( $email, $body, $sub) 
{
	$timezone = "Asia/Calcutta";
	date_default_timezone_set($timezone);
	$mail  = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->IsSMTP();    // set mailer to use SMTP^M
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = MAIL_HOST;    // specify main and backup server^M
	$mail->SMTPAuth = true;    // turn on SMTP authentication^M
	$mail->Username = MAIL_FROM;    // Gmail username for smtp.gmail.com -- CHANGE --^M
	$mail->Password = MAIL_FROM_PWD;    // SMTP password -- CHANGE --^M
	$mail->Port = MAIL_PORT;    // SMTP Port^M
	$mail->Subject = $sub;
	$mail->MsgHTML($body);
	//echo $body;
	$mail->IsHTML(true);
	$mail->SetFrom(MAIL_FROM, 'Foods On Wheels');
	$mail->From = MAIL_FROM;    //From Address -- CHANGE --^M
	$mail->FromName = "Foods On Wheels";    //From Name -- CHANGE --^M
	$mail->AddAddress($email, "");    //To Address -- CHANGE --^M
	
	if(!$mail->Send()) {
			return 0;
	}
	return 1;
}
?>