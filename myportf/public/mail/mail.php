<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    session_start();
    // $messages = [];

    if ($_POST) {
 
        // update data from request
        if (isset($_POST['mail']) && isset($_POST['long_text']) && isset($_POST['fname']) && isset($_POST['sname'])) {
            $data['mail'] = $_POST['mail'];
            $data['fname'] = $_POST['fname'];
            $data['sname'] = $_POST['sname'];
            $data['long_text'] = $_POST['long_text'];
        }
     
        // validate data
        $valid = true; // we assert that everything is ok
        if ($data['mail'] == '' || $data['fname'] == '' || $data['sname'] == '' || $data['long_text'] == '') {
     
            // add an error message
            $messages[] = 'Make sure that first name, second name, mail and the message are entered';
            
            $valid = false; // we indicate that not everything is ok
        }
     
        // if validation succeeded
        if ($valid) {
     
            // somehow save the data into the database
            // db_save($data);
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

                
                $_SESSION['success'] = "<div class='success'>Message was sent!</div>";
                
            
                
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                $_SESSION['success'] = "<div class='success'>Something went wrong, try again.</div>";
            }
     
            // $_SESSION['time'] = time();
            header('Location:index.php');
        }
    }

    sleep(5);
    unset($_SESSION['succes']);
?>