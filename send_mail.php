<?php
  
    if($_POST) {
        $name = "";
        $email = "";
        $message = "";
        $email_body = " ";
        $recipient = "roush757@yahoo.com";
        $home = "index.html";
        
        if(isset($_POST['name'])) {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $email_body .= "Name: ".$first_name. '';
        }
    
        if(isset($_POST['email'])) {
            $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        
        if(isset($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']);
        }
        
        $email_body .= " ";
    
        $headers  = 'MIME-Version: 1.0' . "\r\n"
        .'Content-type: text/html; charset=utf-8' . "\r\n"
        .'From: ' . $email . "\r\n"
        .'Message: ' . $message . "\r\n";
        
        if(mail($recipient, $email_body, $headers)) {
            echo "<p>Thank you for contacting me, $name. Expect a replay as soon as I am available. <a href=".$home.">Return to Home</a></p>";
        } else {
            echo '<p>Sorry but the email did not go through.</p>';
        }
        
    } else {
        echo '<p>Something went wrong! Please try again.</p>';
    }
?>