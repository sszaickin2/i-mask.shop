<?php

ob_start();
if (isset($_POST['userName']) && 
    isset($_POST['userName']) &&
    isset($_POST['userPhone'])){

require('php/saveToBD.php');
require('php/sendMail.php');

$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$userPhone = $_POST['userPhone'];







if (

    sendMail('Новая заявка с сайта', "Имя пользователя: ${userName}, его почта: ${userEmail}, его телефон: ${userPhone}, его вопрос: ${userMessage}.") != true) // сообщение которое отпровляется пользователю 
{
    echo "Письмо не отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
    return;
}else{
    echo "<br>"."отправлено";
}


if (saveToBD($userName,$userEmail,$userPhone)){
  header('Location: index.html');
}else{
  echo "Информация не занесена в базу данных";
}
}
ob_end_flush();
?>

