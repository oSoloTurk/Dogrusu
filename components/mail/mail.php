<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
require 'settings/mail_settings.php';

$to = $_POST['toMail']; 
$mail = new PHPMailer(true);
try {
    $token = hash('sha256', $to."-".$data['id']);
    $mail->SMTPDebug = false;
    $mail->IsSMTP();

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = $GLOBALS['mail_settings']['STMP_HOST'];
    $mail->Port = 465;
    $mail->Username = $GLOBALS['mail_settings']['USERNAME'];
    $mail->Password = $GLOBALS['mail_settings']['STMP_PASSWORD']; 

    $mail->setFrom($GLOBALS['mail_settings']['MAIL_FROM_1'], $GLOBALS['mail_settings']['MAIL_FROM_2']);
    $mail->addAddress($_POST['toMail']);

    $mail->isHTML(true);
    $mail->Subject = $GLOBALS['mail_settings']['EMAIL_SUBJECT'];
    ob_start();
    include("components/mail/mail_creator.php");
    $mail->Body = ob_get_clean();
    $mail->send();
    //executeQuery($GLOBALS['SQL_COMMANDS']['UPDATE_USER_EMAIL_CODE'], "si", NULL, $data['id']);
    //executeQuery($GLOBALS['SQL_COMMANDS']['UPDATE_USER_EMAIL_CODE'], "si", $token, $data['id']);
} catch (Exception $e) {
    sendToPage("index.php?msg=error");
}

?>
