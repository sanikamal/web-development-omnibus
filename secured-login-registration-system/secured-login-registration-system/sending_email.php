<?php
    require_once("vendor/autoload.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
    $mail->SMTPSecure = "ssl";
    // $mail->SMTPSecure = 'tls';
    // $mail->Port       = 587;

    $mail->Username = "example@gmail.com";
    $mail->Password = "password";

    $mail->setFrom("example@gmail.com","Sani Kamal");
    $mail->addReplyTo("example@gmail.com","Sani Kamal");
    // Add cc or bcc 
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    // Set email format to HTML
    $mail->isHTML(true);

    // recipient
    // "inquiry.qinnovation" <inquiry.qinnovation@gmail.com>
    $mail->addAddress("inquiry.qinnovation@gmail.com");

    $mail->Subject = "Sending from localhost";
    $mail->Body = "
                    <div style='color: blue;font-size: 20px;background-color:grey;'>
                        Thank you buddy!!!
                    </div>
                ";

    if($mail->send()) {
        echo "Email sent";
    } else {
        echo "Sorry somethings wrong";
    }


    // Send HTML Email with Attachments

// Use addAttachment() method of PHPMailer class to add an attachment to the email. 
// You can attach multiple attachments to the email by adding addAttachment() method multiple times.

// Add attachments
// $mail->addAttachment('files/abc.pdf');
// $mail->addAttachment('files/abc.docx');

// Send Email to Multiple Recipients

// Add addAddress() method multiple times for sending email to the multiple recipients.

// Add multiple recipients
// $mail->addAddress('john.doe@gmail.com', 'John Doe');
// $mail->addAddress('mark@example.com'); // name is optional
