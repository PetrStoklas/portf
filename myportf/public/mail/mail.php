<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    
    if (isset($_POST['submit'])) {
        
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sharkbootcampshark@gmail.com';     // SMTP username
            $mail->Password = 'Shark2268';                        // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also 
            
            //accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom($_POST['mail'], $_POST['fname']." ".$_POST['sname']);
            $mail->addAddress('sharkbootcampshark@gmail.com', 'Shark');     // Add a recipient
            $mail->addReplyTo($_POST['mail'], 'Information');
        
            //Content
            $mail->isHTML(true);                                            // Set email format to HTML
            $mail->Subject = 'New message from my portfolio visitor';
            $mail->Body    = $_POST['long_text'];
        
            $mail->send();  
            
            echo 'Message was sent';
            
            //sends the mail
    
            include 'db/db.php'; 
            
            
            //saves the mail in database
            
            header('Location:index.php');
            exit;
            
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

?>