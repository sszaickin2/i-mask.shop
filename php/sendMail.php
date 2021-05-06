

<?php 

require 'toEdit.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$me=$SMTP_USERNAME;

function sendMail($subj, $body, $send_to = 'client@i-mask.pro', $name="Сайт")
{
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
    	require 'toEdit.php';
        $mail->SMTPDebug = false;
        $mail->CharSet = $SMTP_CHAR_SET;
        $mail->isSMTP();
        $mail->Host       = $SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = $SMTP_USERNAME;  // почта от которой будет отправляться 
        $mail->Password   = $SMTP_PASSWORD; // пароль от неё
        $mail->SMTPSecure = $SMTP_SECURE;
        $mail->Port       = 465;
        $mail->setFrom($SMTP_USERNAME,$TITLE_FROM); // почта от которой будет отправляться 
        $mail->addAddress($send_to,$name);  // почта на которую будет приходить
        $mail->addAddress("imaskbeta@gmail.com",$name);  // почта на которую будет приходить
        $mail->isHTML(true);
        $mail->Subject = $subj;
        $mail->Body    = $body;
    
        $mail->send();
        return true;
        
        } catch (Exception $e) {
            return false;
        }
}



?>