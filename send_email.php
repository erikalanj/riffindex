<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    // Set email variables
    $to = "joelsantos@my.ccsu.edu"; // Send email to this address
    $subject = "Message from: " . $name;
    $body = "You have received a new message from your website contact form.\n\n".
            "Name: " . $name . "\n".
            "Email: " . $email . "\n\n".
            "Message:\n" . $message;
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message.";
    }
}
?>
