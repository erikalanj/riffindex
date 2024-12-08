<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer (adjust the path if necessary)
require 'vendor/autoload.php'; // If installed via Composer

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $message = htmlspecialchars($_POST['Message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'riffindex@gmail.com'; // Your email
        $mail->Password = 'hufrvqufkidwwaei';   // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('riffindex@gmail.com', 'Contact Form');
        $mail->addAddress('riffindex@gmail.com', 'Riff Index');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "<strong>Name:</strong> $name<br>
                       <strong>Email:</strong> $email<br>
                       <strong>Message:</strong> $message";

        // Send email
        $mail->send();
        // Redirect with success message
        header("Location: index.php?status=success");
        exit;
    } catch (Exception $e) {
        // Redirect with error message
        header("Location: index.php?status=error");
        exit;
    }
}
?>
