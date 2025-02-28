<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $contact = htmlspecialchars($_POST["contact"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vonephotoediting@gmail.com'; // Replace with your Gmail
        $mail->Password = 'oqdm clhe votm xxta'; // Use App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email Content
        $mail->setFrom($email, $name);
        $mail->addAddress("vonephotoediting@gmail.com");
        $mail->Subject = "New Contact Us from $name";
        $mail->Body = "Name: $name\nEmail: $email\nContact No: $contact\nMessage:\n$message\n";

        $mail->send();
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='Contact us.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send message. Error: {$mail->ErrorInfo}'); window.location.href='Contact us.html';</script>";
    }
} else {
    echo "<script>alert('Invalid Request'); window.location.href='Contact us.html';</script>";
}
?>
