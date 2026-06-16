<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill all fields.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shahzaibriaz69@gmail.com';
        $mail->Password = 'ronbxtyvfjfaaofi';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;


        $mail->setFrom('shahzaibriaz69@gmail.com', 'Portfolio Website');
        $mail->addAddress('shahzaibriaz69@gmail.com');
        $mail->addReplyTo($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Message from ' . $name;

        $mail->Body = "
            <h3>New Message Received</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br/>" . nl2br($message) . "</p>
        ";

        $mail->send();


        echo "<script>
                alert('Thank you! Your message has been sent successfully.');
                window.location.href = 'index.php'; /* Apni main file ka name likhein */
              </script>";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Direct access not allowed.";
}