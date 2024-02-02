<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // access
        $secretKey = '6Lfp5EIpAAAAABX_IjvEyo6_3Yg5ofbwmkFkFvSk';
        $captcha = $_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
          exit;
        }

        # FIX: Replace this email with recipient email
        $mail_to = "info@skcardetailing.com.au";
        
        # Sender Data
        
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $mobile = trim($_POST["mobile"]);
        $email = trim($_POST["email"]);
		$select_services = trim($_POST["select_services"]);
		$message = trim($_POST["message"]);
        
       

        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

        if(intval($responseKeys["success"]) !== 1) {
          echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
        } else {
            # Mail Content
		    $subject = "CONTACT FORM";
			$content = "CONTACT FORM\n\n";
            $content .= "Name: $name\n"; 
            $content .= "Email: $email\n"; 
            $content .= "Mobile: $mobile\n";
            $content .= "Services: $select_services\n";
            $content .= "Message: $message\n";

            # email headers.
            $headers = 'From: '.$email."\r\n" .
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();

            # Send the email.
            $success = mail($mail_to, $subject, $content, $headers);
            if ($success) {
                # Set a 200 (okay) response code.
                http_response_code(2000);
               echo "<script>window.location.href='thank-you.html';</script>";
               echo "<script>window.location.href='https://skcardetailing.com.au/';</script>";
            } else {
                # Set a 500 (internal server error) response code.
                http_response_code(500);
                echo '<p class="alert alert-warning">Oops! Something went wrong, we couldnt send your message.</p>';
            }
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo '<p class="alert alert-warning">There was a problem with your submission, please try again.</p>';
    }

?>
