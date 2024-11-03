<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values and sanitize them
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $msg     = htmlspecialchars(trim($_POST['msg']));

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = 'almi.rayyen@gmail.com';
        $headers = 'From: "'.$name.'" <'.$email.'>';
        $output = "Name: ".$name."\nEmail: ".$email."\nSubject: ".$subject."\n\nMessage: ".$msg;

        // Send email
        $send = mail($to, $subject, $output, $headers);
        
        // Check if the email was sent successfully
        if ($send) {
            echo "Message sent successfully!";
        } else {
            echo "There was a problem sending the message.";
        }
    } else {
        echo "Invalid email address.";
    }
}
?>
