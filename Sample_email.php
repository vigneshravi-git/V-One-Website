<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $company = htmlspecialchars($_POST['company']);
    $city = htmlspecialchars($_POST['city']);
    $country = htmlspecialchars($_POST['country']);
    $skype = htmlspecialchars($_POST['skype']);
    $sampleLink = htmlspecialchars($_POST['sample_link']);
    $services = htmlspecialchars($_POST['services']);
    $requestingAs = htmlspecialchars($_POST['requesting_as']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true); // ✅ Declare the PHPMailer object

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vonephotoediting@gmail.com'; // ✅ Your Gmail
        $mail->Password = 'oqdm clhe votm xxta'; // ❌ **Don't share your app password publicly!**
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('vonephotoediting@gmail.com'); // ✅ Receiving email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Free Sample Request';
        $body = "Name: $name<br>";
        $body .= "Email: $email<br>";
        $body .= "Contact No.: $contact<br>";
        $body .= "Company/Domain: $company<br>";
        $body .= "City: $city<br>";
        $body .= "Country: $country<br>";
        $body .= "Skype ID: $skype<br>";
        $body .= "Sample File Link: $sampleLink<br>";
        $body .= "Services Looking For: $services<br>";
        $body .= "Requesting As: $requestingAs<br>";
        $body .= "Message/Comment:<br>$message<br>";

        $mail->Body = $body; // ✅ Set email body

        // Send email
        $mail->send();
        echo "<script>alert('Your request has been sent successfully!'); window.location.href='Get free Sample.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid Request'); window.history.back();</script>";
}
?>
