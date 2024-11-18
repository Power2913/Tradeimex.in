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
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);
        $phone = sanitizeInput($_POST['number']);
        $company = sanitizeInput($_POST['company']);
        $role = sanitizeInput($_POST['role']);
        $message = sanitizeInput($_POST['message']);
        $br = "<br>";

        echo $phone;

        $response = $_POST["recaptcha_response"];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6Ld1Ax8pAAAAAOT-lW4WcdOIkOzgY87SMA1yYOM_',
            'response' => $_POST["recaptcha_response"]
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify, true);

        if ($captcha_success['score'] >= 0.5) {
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);
            try {
                // Configure the PHPMailer instance
                $mail->isSMTP();
                $mail->Host = 'email-smtp.ap-south-1.amazonaws.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'AKIARG6CI77DA4R656X3';
                $mail->Password = 'BKM6KD1eSstN4ElabXK0mLsQ5xfqomVPyuHvirlX6a8m';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Set the sender, recipient, subject, and body of the message
                $mail->setFrom('info@tradeimex.in', 'Tradeimex');
                $mail->addAddress('info@tradeimex.in', $name);
                $mail->Subject = 'CONTACT US QUERY';
                $mail->isHTML(true);
                
                $mail->Body = '  NAME =  ' . $name . $br    . '  EMAIL =  ' . $email . $br  . '  PHONE NUMBER =  ' . $phone . $br . '  COMPANY =  ' . $company . $br . '  IMPORT/EXPORT =  ' . $role . $br . '  MESSAGE=  ' . $message . $br;

                // Send the message
                $mail->send();

                echo
                "<script>
                    window.location ='thankyou.php';
                </script>";
            } 
            catch (Exception $e) 
            {
                echo "Sorry for inconvenience, You can directly send mail to info@tradeimex.in";
            }
        }
    }
    function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }
?>