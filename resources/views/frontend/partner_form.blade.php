<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

    $errors = [];
    $errorMessage = '';
    $successMessage = '';
    $siteKey = '6Ld1Ax8pAAAAAJWU_TaW2gMhMvAOeRl885SXqVPT'; // reCAPTCHA site key
    $secret = '6Ld1Ax8pAAAAAOT-lW4WcdOIkOzgY87SMA1yYOM_'; // reCAPTCHA secret key

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fname = sanitizeInput($_POST['fname']);
        $lname = sanitizeInput($_POST['lname']);
        $email = sanitizeInput($_POST['email']);
        $phone = sanitizeInput($_POST['number']);
        $msg = sanitizeInput($_POST['msg']);
        $apply = sanitizeInput($_POST['apply']);
        $br = "<br>";
        $response = $_POST["recaptcha_response"];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6Ld1Ax8pAAAAAOT-lW4WcdOIkOzgY87SMA1yYOM_',
            'response' => $_POST["recaptcha_response"]
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify, true);

        

        echo $verify; //error because it's on local..when site is live it will work fine


        // if ($captcha_success['score'] <= 0.5) {
        //     // Create a new PHPMailer instance
        //     $mail = new PHPMailer(true);
        //     try {
        //         // Configure the PHPMailer instance
        //         $mail->isSMTP();
        //         $mail->Host = 'email-smtp.ap-south-1.amazonaws.com';
        //         $mail->SMTPAuth = true;
        //         $mail->Username = 'AKIARG6CI77DA4R656X3';
        //         $mail->Password = 'BKM6KD1eSstN4ElabXK0mLsQ5xfqomVPyuHvirlX6a8m';
        //         $mail->SMTPSecure = 'tls';
        //         $mail->Port = 587;

        //         // Set the sender, recipient, subject, and body of the message
        //         $mail->setFrom('info@tradeimex.in', 'Tradeimex');
        //         $mail->addAddress('info@tradeimex.in', $name);
        //         $mail->Subject = 'PARTNER QUERY';
        //         $mail->isHTML(true);
                
        //         $mail->Body = ' FIRST NAME =  ' . $fname . $br . 'LAST NAME ='  . $lname . $br . '  EMAIL =  ' . $email . $br  . '  PHONE NUMBER =  ' . $number . $br . '  MESSAGE =  ' . $msg . $br . '  APPLIED AS =  ' . $apply . $br;

        //         // Send the message
        //         $mail->send();

        //         echo
        //         "<script>
        //             window.location ='thankyou.php';
        //         </script>";
        //     } 
        //     catch (Exception $e) 
        //     {
        //         echo "Sorry for inconvenience, You can directly send mail to info@tradeimex.in";
        //     }
        // }
    }
    function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }

?>