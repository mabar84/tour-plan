<?php
include ('password.php');
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];


// параметры проверяются только если одна из форм активирована
// Формирование самого письма

  if ( empty($phone )) {
    $title = "Подписка на рассылку";
    $body = "
    <h2>Новый абонент!</h2>
    <b>Электронная почта абонента:</b><br>$email
    ";    
  }   
  else {
    if ( empty($email)) {
    $title = "Сообщение Best Tour Plan";
    $body = "
    <h2>Новое сообщение</h2>
    <b>Имя:</b> $name<br>
    <b>Телефон:</b> $phone<br>
    <b>Сообщение:</b><br>$message
    ";         
    }
    else {
      $title = "Booking Best Tour Plan";
      $body = "
      <h2>Booking</h2>
      <b>Имя:</b> $name<br>
      <b>Телефон:</b> $phone<br>
      <b>Электронная почта:</b><br>$email<br>
      <b>Сообщение:</b><br>$message
      ";
    }
  } 

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = $username; // Логин на почте
    $mail->Password   = $password; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom($useremail, 'Best Tour Plan'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress($useremail);      

  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');