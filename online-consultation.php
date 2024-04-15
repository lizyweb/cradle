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
    $subject = 'Online consultation Form';

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
    $message = "<h2>Online consultation Form</h2>";
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

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="imgs/fav-logo.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia|Galindo|Roboto|Tinos|Blinker">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>

    <!-- Assets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/animate/animate.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/aos/aos.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Cradle Child Care</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

  <div class="container mt-5 mb-5 d-flex align-items-center justify-content-center">
      <div class="row">
          <div class="col-lg-1">
              <img src="img/image/qr.jpeg" alt="Image" height="300px">
          </div>
      </div>
  </div>

</body>
</html>