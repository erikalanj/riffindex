<?php
$to = "erikj@my.ccsu.edu"; // Replace with your email
$subject = "Test email from PHP mail() function";
$message = "This is a test message to check the PHP mail function.";
$headers = "From: erikj@my.ccsu.edu" . "\r\n" .
    "Reply-To: erikj@my.ccsu.edu" . "\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Test email sent successfully!";
} else {
    echo "Failed to send test email.";
}
