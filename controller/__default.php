<?php

    // for banner query start
    $bannersql = mysqli_query($con, "SELECT * FROM `banners` WHERE status=1");

    // for about query start
    $aboutsql = mysqli_query($con, "SELECT * FROM `about` WHERE status=1");
    $aboutrow = mysqli_fetch_assoc($aboutsql);

    // for brands query start
    $brandsql = mysqli_query($con, "SELECT * FROM `brands` WHERE status=1");
    
    // for applications query start
    $applicationsql = mysqli_query($con, "SELECT * FROM `childcategory` WHERE `status` = '1' AND `subcat_id` = '90'");

    // for philosophy query start
    $philosophysql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND id=79");
    $philosophyrow = mysqli_fetch_assoc($philosophysql);
 
    // for sindicate query start
    $sindicatesql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND id=80");
    $sindicaterow = mysqli_fetch_assoc($sindicatesql);
    
    // for gtbindia query start
    $gtbindiasql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND id=81");
    $gtbindiarow = mysqli_fetch_assoc($gtbindiasql);


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $phone_number = trim(mysqli_real_escape_string($con, $_POST['phone_number']));
    $msg_subject = trim(mysqli_real_escape_string($con, $_POST['msg_subject']));
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
    $bodydata = "Name : $name<br>Email: $email<br>Mobile: $phone_number<br>Subject: $msg_subject<br>Message : $message";
    echo SendEmailer($senderemail,$subject,$bodydata);
    $query = mysqli_query($con, "INSERT INTO `query`(`id`, `name`, `emailid`, `phone`, `subject`, `message`, `date`) VALUES (Null, '$name','$email','$phone_number','$msg_subject','$message','$current_date')");
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