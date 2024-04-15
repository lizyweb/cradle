<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Get form data
    $department = $_POST['department'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['w-number'];
    $comments = $_POST['comments'];

    // Define email subject
    $subject = 'Appointment Request';

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'mail.lizyweb.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'smt@lizyweb.com';
    $mail->Password = 'Lizyweb@123';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set sender and recipient email addresses
    $mail->setFrom('smt@lizyweb.com', 'Your Website');
    $mail->addAddress('smiles@cradlechildcare.com');

    // Set email subject
    $mail->Subject = $subject;

    // Compose HTML message
    $message = "<h2>Appointment Request</h2>";
    $message .= "<p><strong>Department:</strong> $department</p>";
    $message .= "<p><strong>Name:</strong> $name</p>";
    $message .= "<p><strong>Phone:</strong> $phone</p>";
    $message .= "<p><strong>WhatsApp:</strong> $whatsapp</p>";
    $message .= "<p><strong>Comments:</strong> $comments</p>";

    // Set HTML message
    $mail->isHTML(true);
    $mail->Body = $message;

    // Send email
    if ($mail->send()) {
        // On success
        echo '<div id="success_page">';
        echo '<h1>Your Message Sent Successfully.</h1>';
        echo "<p>Thank you <strong>$name</strong>, your appointment request has been submitted. We will contact you shortly.</p>";
        echo '</div>';

        echo '<a href="index.html">Return to Home</a>';
    } else {
        // On failure
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo 'Mailer Error: ' . $e->getMessage();
}
?>