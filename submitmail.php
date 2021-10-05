<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
if (!empty($_POST)) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mess = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            // Set mailer to use SMTP ok
        $mail->Host       = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'XXXXXXXXXXX@gmail.com';                     // SMTP configuredGmail email id
        $mail->Password   = 'XXXXXXXX';                               // SMTP configured Gmail password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('XXXXXXXXXXX@gmail.com', 'Mailer');          //Gmail Id same as above
        $mail->addAddress($email, $name);     // Add a recipient

        $body = '<p><strong>Hello ' . $name . '</strong> thanks for contacting us.</p>';

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Contact Us Email';
        $mail->Body    = $body;

        $mail->send();
        echo "Message has been Sent, Check your mail";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
