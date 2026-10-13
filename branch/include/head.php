<?php $url = explode("/", $_GET['type']);
for ($i = 0; $i < count($url); $i++){
${"geturl".($i+1)} = $url[$i]; }

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
      $mail->SMTPAuth   = true;                                                  //SMTP password
      $mail->Username   = 'jaspreet@shivazippers.com';                     //SMTP username
      $mail->Password   = 'cpge dbhh gbqj qhyx';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

      //Recipients
      $mail->setFrom('no-reply@shivazippers.com', 'Shivazippers');
      $mail->addAddress("$senderemail", 'Shivazippers');     //Add a recipient
      //  $mail->addAddress('ellen@example.com');               //Name is optional
      //  $mail->addReplyTo('info@example.com', 'Information');
      //  $mail->addCC('sample@domain.in');



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

$sqlc = mysqli_query($con, "SELECT * FROM `category` WHERE `url`  = '$geturl1' AND `type` = 1");
if(mysqli_num_rows($sqlc)){
$rwc = mysqli_fetch_array($sqlc);
$catid = $rwc['id'];
$caturl = $rwc['url'];
$cattitle = $rwc['title'];
$pagename = $rwc['title'];
$file = $rwc['file'];
$metatitle = empty($rwc['meta_title']) ? $rwc['title'] : $rwc['meta_title'];
$metakeywords = $rwc['meta_keywords'];
$metadesc = $rwc['meta_desc'];
$breadcrumbtitle = $cattitle;
$breadcrumblist = "<li>$breadcrumbtitle</li>";
$data = $rwc['desc'];
$sdesc = $rwc['sdesc'];
}

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


$sqlsc = mysqli_query($con, "SELECT * FROM `childcategory` WHERE `url`  = '$geturl3'");
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
$breadcrumblist = "<li><a href='{$path}{$caturl}'>$cattitle</a> <i class='fa fa-caret-right'></i></li><li><a href='{$path}{$suburl}'>$subtitle</a> <i class='fa fa-caret-right'></i></li><li>$breadcrumbtitle</li>";
$data = $rwsc['desc'];
$sdesc = $rwsc['sdesc'];
}

    if (file_exists("controller/__$geturl1.php")) {
        include ("controller/__$geturl1.php");
    } else {
        include ("controller/__default.php");
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?=$metatitle;?></title>
<meta name="description" content="<?=$metadesc?>">
<meta name="Keywords" content="<?=$metakeywords?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="favicon.png">
<!-- CSS here -->
    <link rel="canonical" href="<?php echo $actual_link;?>">
<link rel="stylesheet" href="<?=$path;?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/meanmenu.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/animate.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/owl-carousel.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/swiper-bundle.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/backtotop.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/magnific-popup.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/nice-select.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/font-awesome-pro.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/spacing.css">
<link rel="stylesheet" href="<?=$path;?>assets/css/main.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css'>

<script src="https://www.google.com/recaptcha/api.js?render=6LdbW-0rAAAAAK86zfTym5iJwQ2P-B_QFXSX5O7G"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EJNBM9KPF2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-EJNBM9KPF2');
</script>
</head>

<body>

<?php include('header.php'); ?>

<main>
<?php if(empty($geturl1)){
  include('view/default.php');
}else{
  include('view/pages.php');
} ?>


</main>