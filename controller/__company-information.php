<?php

$sqlsc = mysqli_query($con, "SELECT * FROM `category` WHERE `url`  = '$geturl2' AND `type` != 1");
if(mysqli_num_rows($sqlsc)){
$rwsc = mysqli_fetch_array($sqlsc);
$subid = $rwsc['id'];
$subtitle = $rwsc['title'];
$pagename = $rwsc['title'];
$suburl = $rwsc['url'];
$file = $rwsc['file'];
$metatitle = empty($rwsc['meta_title']) ? $rwsc['title'] : $rwsc['meta_title'];
$metakeywords = $rwsc['meta_keywords'];
$metadesc = $rwsc['meta_desc'];
$breadcrumbtitle = $subtitle;
$breadcrumblist = "<li><a href='{$path}{$caturl}'>$cattitle</a> <i class='fa fa-caret-right'></i></li><li>$breadcrumbtitle</li>";
$data = $rwsc['desc'];
$sdesc = $rwsc['sdesc'];
}

$factorytoursqlsc = mysqli_query($con, "SELECT * FROM `tour` WHERE status=1");

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
    $query = mysqli_query($con, "INSERT INTO `enquiry`(`id`, `name`, `emailid`, `phone`, `subject`, `message`, `date`) VALUES (Null, '$name','$email','$phone_number','$msg_subject','$message','$current_date')");
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