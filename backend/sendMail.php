<?php
require '../Sneaker/vendor/autoload.php';
require '../Sneaker/backend/helpers.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// $link = get_url_origin() . "/";

// var_dump($link);

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'thanhtestsend@gmail.com'; //SMTP username
    $mail->Password = 'rgvrxvrknkkyohqo'; //SMTP password
    $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
    $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('thanhtestsend@gmail.com', 'Mailer');

    //Content
    $mail->isHTML(true); //Set email format to HTML

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

function send_mail(array $user, $Subject, $Body)
{
    global $mail;
    $mail->addAddress('nguyenxuanthanh0807@gmail.com', 'Joe User'); //Add a recipient
    $mail->Subject = 'Forget Password';
    $mail->Body = 'This is link

    <br/>';
    $email = $user["email"];
    $username = $user["username"];

    if ($mail->send()) {
        return true;
    } else {
        // echo "Mailer Error: " . $mail->ErrorInfo;

        return false;
    }

}
