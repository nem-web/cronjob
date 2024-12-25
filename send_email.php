<?php
// Include PHPMailer library
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

// Configure email parameters
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = '@gmail.com'; // Your Gmail address
    $mail->Password = 'your-email-password'; // Your Gmail password or App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipient and sender
    $mail->setFrom('your-email@gmail.com', 'Your Name');
    $mail->addAddress('recipient-email@gmail.com', 'Recipient Name'); // Recipient email and name

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Automated Email on Page Reload';
    $mail->Body = '<h1>Hi!</h1><p>This is an automated email sent when the page was reloaded.</p>';

    // Send the email
    $mail->send();
    echo json_encode(['status' => 'success', 'message' => 'Email sent successfully!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => "Email could not be sent. Error: {$mail->ErrorInfo}"]);
}
