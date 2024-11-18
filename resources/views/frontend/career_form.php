<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require '../vendor/autoload.php';
    $mail = new PHPMailer(true);

    $errors = [];
    $errorMessage = '';
    $successMessage = '';
    $siteKey = '6Ld1Ax8pAAAAAJWU_TaW2gMhMvAOeRl885SXqVPT'; // reCAPTCHA site key
    $secret = '6Ld1Ax8pAAAAAOT-lW4WcdOIkOzgY87SMA1yYOM_'; // reCAPTCHA secret key
 
    // Email settings 
    $mail->isSMTP();    //Send using SMTP
    $mail->Host       = 'email-smtp.ap-south-1.amazonaws.com'; //Set the SMTP server to send through
    $mail->SMTPAuth   = true; //Enable SMTP authentication
    $mail->Username   = 'AKIARG6CI77DA4R656X3'; //SMTP username
    $mail->Password   = 'BKM6KD1eSstN4ElabXK0mLsQ5xfqomVPyuHvirlX6a8m'; //SMTP password
    $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
    $mail->Port       = 587;   
    $toEmail = 'hr@tradeimex.in'; // Recipient email 
    $from = 'hr@tradeimex.in'; // Sender email 
    $fromName = 'Tradeimax'; // Sender name 
 
    // File upload settings 
    $attachmentUploadDir = "../career_uploads/"; 
    $allowFileTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
 
 
    /* Form submission handler code */ 
    $postData = $uploadedFile = $statusMsg = $valErr = ''; 
    $msgClass = 'errordiv'; 
    if(isset($_POST['submit'])) { 
        // Get the submitted form data 
        $name = trim($_POST['name']);
        $phone = trim($_POST['number']);
        $email = trim($_POST['email']); 
        $dob = trim($_POST['dob']); 
        $position = trim($_POST['position']);
        $cv = $_FILES['cv']['name'];
        $cvTmp = $_FILES['cv']['tmp_name'];
        $file_size = $_FILES['cv']['size'];


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
    
        // Validate input data 
        if(empty($name)) { 
            $valErr .= 'Please enter your name.<br/>'; 
        } 
        if(empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
            $valErr .= 'Please enter a valid email.<br/>'; 
        } 
        if(empty($phone)) { 
            $valErr .= 'Please enter phone number.<br/>'; 
        } 
        if(empty($dob)) { 
            $valErr .= 'Please enter dob.<br/>'; 
        }
        if(empty($position)) { 
            $valErr .= 'Please Select Position.<br/>'; 
        }
        if(empty($cv)) { 
            $valErr .= 'Please Upload Your CV/Resume.<br/>'; 
        }
        
        // if ($captcha_success['score'] <= 0.5) {
            // Check whether submitted data is valid 
            if(empty($valErr)) { 
                $uploadStatus = 1; 
                
                if($file_size > 3822575) {
                    $message = 'File too large. File must be less than 3 megabytes.'; 
                    echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
                }
                else {
                    // Upload attachment file 
                    if(!empty($_FILES["cv"]["name"])) { 
                        // File path config 
                        $targetDir = $attachmentUploadDir; 
                        $fileName = basename($_FILES["cv"]["name"]); 
                        $targetFilePath = $targetDir . $fileName; 
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                        
                        // Allow certain file formats 
                        if(in_array($fileType, $allowFileTypes)) { 
                            // Upload file to the server 
                            if(move_uploaded_file($cvTmp, $targetFilePath)){ 
                                $uploadedFile = $targetFilePath; 
                            }
                            else {
                                $uploadStatus = 0;
                                $statusMsg = "Sorry, there was an error uploading your file.";
                                echo $statusMsg;
                            } 
                        }
                        else { 
                            $uploadStatus = 0;
                            $statusMsg = 'Sorry, only '.implode('/', $allowFileTypes).' files are allowed to upload.'; 
                            echo $statusMsg;
                        } 
                    } 
                }
                
                
                if($uploadStatus == 1){ 
                    // Email subject 
                    $emailSubject = 'Job Request Submitted by '.$name; 
                    
                    // Email message  
                    $htmlContent = 
                    '<h2>Career Form</h2>
                    <p><b>Name:</b> '.$name.'</p>
                    <p><b>Phone:</b> '.$phone.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>DOB:</b><br/>'.$dob.'</p>
                    <p><b>Position:</b> '.$position.'</p>';
                    
                    // Header for sender info 
                    $headers = "From: $fromName"." <".$from.">"; 
        
                    // Add attachment to email 
                    if(!empty($uploadedFile) && file_exists($uploadedFile)){ 
                        
                        // Boundary  
                        $semi_rand = md5(time()); 

                        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
                        
                        // Headers for attachment  
                        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
                        
                        // Multipart boundary  
                        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
                        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
                        
                        // Preparing attachment 
                        if(is_file($uploadedFile)){ 
                            $message .= "--{$mime_boundary}\n"; 
                            $fp =    @fopen($uploadedFile,"rb"); 
                            $data =  @fread($fp,filesize($uploadedFile)); 
                            @fclose($fp); 
                            $data = chunk_split(base64_encode($data)); 
                            $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" .  
                            "Content-Description: ".basename($uploadedFile)."\n" . 
                            "Content-Disposition: cv;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" .  
                            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
                        } 
                        
                        $message .= "--{$mime_boundary}--"; 
                        $returnpath = "-f" . $email; 
                        
                        // Send email 
                        $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath); 
                        
                        // Delete attachment file from the server 
                        // @unlink($uploadedFile); 
                    }
                    else
                    { 
                        // Set content-type header for sending HTML email 
                        $headers .= "\r\n". "MIME-Version: 1.0"; 
                        $headers .= "\r\n". "Content-type:text/html;charset=UTF-8"; 
                        
                        // Send email 
                        $mail = mail($toEmail, $emailSubject, $htmlContent, $headers);  
                    } 
                    
                    // If mail sent 
                    if($mail) { 
                        $statusMsg = 'Thanks! Your contact request has been submitted successfully.'; 
                        $msgClass = 'succdiv'; 
                        $postData = ''; 
                        echo $statusMsg;
                    }
                    else 
                    { 
                        $statusMsg = 'Failed! Something went wrong, please try again.'; 
                        echo $statusMsg;
                    } 
                } 
            }
            else{ 
                $valErr = !empty($valErr)?'<br/>'.trim($valErr, '<br/>'):''; 
                $statusMsg = 'Please fill all the mandatory fields.'.$valErr; 
                echo $statusMsg;
            }
        // }
        // else {
        //     echo "You're not a human, Try Again";
        // }
    } 
?>