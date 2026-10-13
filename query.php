<?php define('DB_HOST', 'localhost');
define('DB_NAME','shivazip_database');
define('DB_USER','shivazip_user');
define('DB_PASSWORD','&0DipZ5wcf2X');

date_default_timezone_set("Asia/Kolkata"); 
$con = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
require 'PHPMailer/vendor/autoload.php';


function SendEmailer($senderemail,$subject,$bodydata){

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = false;                       
      $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jaspreet@shivazippers.com';                     //SMTP username
    $mail->Password   = 'cpge dbhh gbqj qhyx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('no-reply@shivazippers.com', 'Shivazippers');
    $mail->addAddress("$senderemail", 'Shivazippers');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    //   $mail->addCC('sample@domain.in');



    //Attachment
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$subject";
   
    $mail->Body    = "$bodydata";
    $mail->AltBody = '';

    $mail->send();
      // echo 'Message has been sent';
} catch (Exception $e) {
     //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}

   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $phone_number = trim(mysqli_real_escape_string($con, $_POST['phone_number']));
    $msg_subject = trim(mysqli_real_escape_string($con, $_POST['msg_subject']));
    $message = trim(mysqli_real_escape_string($con, $_POST['message']));
    
    $secretKey = "6LdbW-0rAAAAADmnIMiMg_5D3PVz8r7x88yVIYqP";
    $token = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$token}&remoteip={$userIP}");
    $result = json_decode($response, true);

    if ($result['success'] && $result['score'] >= 0.5) {
    $senderemail = "jaspreet@shivazippers.com";
    $subject = "New Enquiry for $msg_subject";
    $bodydata = "Name : $name<br>Email: $email<br>Mobile: $phone_number<br>Subject: $msg_subject<br>Message : $message";
    echo SendEmailer($senderemail,$subject,$bodydata);
    $query = mysqli_query($con, "INSERT INTO `query`(`id`, `name`, `emailid`, `phone`, `subject`, `message`) VALUES (Null, '$name','$email','$phone_number','$msg_subject','$message')");
    if($query){
        echo "<p class='success'>Contact Submitted Successfully.</p>";
    }else{
        echo "<p class='failed'>Contact Submitted Failed.</p>";
    }
    }else{
        echo "<p class='failed'>reCAPTCHA verification failed. Please try again.</p>";
    }


    exit();
    } 
?>