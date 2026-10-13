<?php

    if (isset($_POST['customizeenquirysubmit'])) {
    $companyname = trim(mysqli_real_escape_string($con, $_POST['companyname']));
    $personname = trim(mysqli_real_escape_string($con, $_POST['personname']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $phone_number = trim(mysqli_real_escape_string($con, $_POST['phone_number']));
    $weight = trim(mysqli_real_escape_string($con, $_POST['weight']));
    $length = trim(mysqli_real_escape_string($con, $_POST['length']));
    $color = trim(mysqli_real_escape_string($con, $_POST['color']));
    $contrast = trim(mysqli_real_escape_string($con, $_POST['contrast']));
    $message = trim(mysqli_real_escape_string($con, $_POST['message']));
    $current_date = date("Y-m-d H:i:s");
    
    $secretKey = "6LdbW-0rAAAAADmnIMiMg_5D3PVz8r7x88yVIYqP";  // your secret key
    $token = $_POST['g-recaptcha-response'] ?? '';
    $userIP = $_SERVER['REMOTE_ADDR'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$token}&remoteip={$userIP}");
    $result = json_decode($response, true);

    if ($result['success'] && $result['score'] >= 0.7) {
    $senderemail = "jaspreet@shivazippers.com";
    $subject = "New Enquiry for $msg_subject";
    $bodydata = "Company Name : $companyname<br>Contact Person Name : $personname<br>Email: $email<br>Mobile: $phone_number<br>weight: $weight<br>length : $length<br>color : $color<br>contrast : $contrast<br>Message : $message";
    echo SendEmailer($senderemail,$subject,$bodydata);
    $query = mysqli_query($con, "INSERT INTO `customizationproductenquiry`(`id`, `companyname`, `personname`, `email`, `phone`, `weight`, `length`, `color`, `contrast`, `message`, `date`) VALUES (Null, '$companyname', '$personname','$email','$phone_number','$weight','$length','$color','$contrast','$message', '$current_date')");
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