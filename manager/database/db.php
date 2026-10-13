<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
define('BASE_PATH',"//localhost/shivazippers/");
define('ADMIN_PATH', '//localhost/manager/');
define('DB_HOST', 'localhost');
define('DB_NAME','shivazip_database');
define('DB_USER','root');
define('DB_PASSWORD','');

date_default_timezone_set("Asia/Kolkata"); 
$path = BASE_PATH;
$adminpath = ADMIN_PATH;
$con = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

  // Actual Link 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$query_str = parse_url($actual_link, PHP_URL_QUERY);
parse_str($query_str, $query_params);
$getparam = $query_params;


// SEO FRIENDLY URL
function seo_friendly_url($string){
     $string = str_replace(array('[\', \']'), '', $string);
     $string = preg_replace('/\[.*\]/U', '', $string);
     $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string); 
     return strtolower(trim($string, '-'));
}

// FUNCTION FOR MOBILE 
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}



/* GENERATE CSRF TOKEN */
$csrftoken = bin2hex(random_bytes(32));
$_SESSION['csrftoken'] = $csrftoken;


function createImgWebp($fileinputname, $imagepath){
    $filename = $_FILES[$fileinputname]['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $tmp = $_FILES[$fileinputname]['tmp_name'];
    $filepath = "";
    if(file_exists("../branch/assets/$imagepath")){
        $filepath = "../branch/assets/".$imagepath."/";
    }else{
        mkdir("../branch/assets/$imagepath", 0777);
        $filepath = "../branch/assets/".$imagepath."/";
    }
    $file1 = $fileinputname . time().'.'.$ext;
    if($ext=='webp' || $ext=='png' || $ext=='svg'){
        $filenewname = $fileinputname . time().'.'.$ext;
        move_uploaded_file($tmp, $filepath.$file1);
    }else{
        $filenewname = $fileinputname . time().'.webp';
        move_uploaded_file($tmp, $filepath.$file1);
    
        $file = $filepath. time().'.'.$ext;
        $imgpath = $filepath.$filenewname;
        $img = imagecreatefromjpeg($filepath . $file1);
    
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
        imagewebp($img, $filepath . $filenewname, 80);
        imagedestroy($img);
        unlink($filepath.$file1);
    }
    return "branch/assets/".$imagepath."/".$filenewname;
}


/*** DEFAULT DATA LOAD ***/
$sqlsetting = mysqli_query($con,"SELECT * FROM `settings`");
$rwlinks = mysqli_fetch_array($sqlsetting);
$websitename = $rwlinks['web_name'];
$headercenterline = $rwlinks['headercenterline'];
$emailid = $rwlinks['email_id'];
$alternateemailid = $rwlinks['alternate_email_id'];
$contactno = $rwlinks['contact_no'];
$alternateno = $rwlinks['alternate_no'];
$whatsapp = $rwlinks['whatsapp_no'];
$address1 = $rwlinks['address1'];
$address2 = $rwlinks['address2'];
$youtubeembedcode = $rwlinks['youtubelink'];
$facebook = $rwlinks['facebook'];
$instagram = $rwlinks['instagram'];
$youtube = $rwlinks['youtube'];
$linkedin = $rwlinks['linkedin'];
$twitter = $rwlinks['twitter'];
$mapiframe1 = $rwlinks['map_iframe1'];
$mapiframe2 = $rwlinks['map_iframe2'];
$googletag = $rwlinks['googletag'];
$footerdesc = $rwlinks['footerdesc'];
$metatitle = !empty($rwlinks['meta_title']) ? $rwlinks['meta_title'] : $rwlinks['web_name'];
$metakeywords = $rwlinks['meta_keywords'];
$metadesc = $rwlinks['meta_desc'];
$logo = $rwlinks['logo'];
$experience = $rwlinks['experience'];

// for applications query start
    $footerapplicationsql = mysqli_query($con, "SELECT * FROM `childcategory` WHERE `status` = '1' AND `subcat_id` = '90'");

// ===== get state name ====== 
function __getStateName($con, $id){
    $sql = mysqli_query($con, "SELECT * FROM `state` WHERE `id` = $id");
    $rw = mysqli_fetch_array($sql);
    return $rw['state'];
}

function __getCategoryName($con, $id){
    $sql = mysqli_query($con, "SELECT * FROM `category` WHERE `id` = $id");
    $rw = mysqli_fetch_array($sql);
    return $rw['url'];
}
function __getChildCategoryName($con, $id){
    $sql = mysqli_query($con, "SELECT * FROM `childcategory` WHERE `id` = $id");
    $rw = mysqli_fetch_array($sql);
    return $rw['url'];
}

// ===== encrypt data ========
function encryptIt($q) {
    $secret_key = 'gloforce@)*(@)Ena234!212IOU';
    $secret_iv = '8';
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
    $output = base64_encode( openssl_encrypt( $q, $encrypt_method, $key, 0, $iv ) );
    return $output;
}       


// ===== decrypt data ========
function decryptIt($q) {
    $secret_key = 'gloforce@)*(@)Ena234!212IOU';
    $secret_iv = '8';
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
    $output = openssl_decrypt( base64_decode( $q ), $encrypt_method, $key, 0, $iv );
    return $output;
}   


// get data from query
function __selectData($con, $tbl, $where=null, $order="ORDER BY `id` DESC", $limit=null){
    $sql=mysqli_query($con,"SELECT * FROM `$tbl` $where $order $limit");
    return $sql;
    exit();
}
// $data=__selectData($con, 'category');
// while($rw=mysqli_fetch_array($data)){
//     echo "hello";
// }


// get single data from query
function __selectOneData($con, $tbl, $id){
    $sql=mysqli_query($con,"SELECT * FROM `$tbl` WHERE `id` = $id");
    $rwgal=mysqli_fetch_array($sql);
    return $rwgal;
    exit();
}




// delete data from query function
function __deleteData($con,$tbl,$id){
    $sql=mysqli_query($con,"DELETE FROM `$tbl` WHERE id IN($id)");
    return $sql;
    exit();
}



$result=[];

// insert data into database from query
function __insertData($con, $tbl, $array=null){
    $key=implode("`, `", array_keys($array));
    $val=implode("', '", array_values($array));
    $sql=mysqli_query($con,"INSERT INTO `$tbl`(`$key`) VALUES('$val')");
    return $sql;
}

// $re=__insertData($con, 'category', ['id'=>null, 'title'=>'Gallery', 'url'=>'gallery', 'cattype'=>1, 'status'=>1]);
// if(count($re) > 0){
//     if($re['success']){
//         echo $re['success'];
//     }else{
//         echo $re['failed'];
//     }
// }


// update data from query
function __updateData($con, $tbl, $id, $array=null){
    $key=implode("`, `", array_keys($array));
    $val=implode("', '", array_values($array));
    $update="";
    foreach($array as $key => $val){
        $update.= "`$key` = '$val', ";
    }
    $update=substr($update, 0, -2);
    $sql=mysqli_query($con,"UPDATE `$tbl` SET $update WHERE `id` = $id");
    return $sql;
}


// $update=__updateData($con, 'category', 16, ['title'=>'Academic', 'url'=>'academic', 'cattype'=>1,]);
// if(count($update) > 0){
//     if($update['success']){
//         echo $update['success'];
//     }else{
//         echo $update['failed'];
//     }
// }

function showTimewithAMPM($time, $fomate){
    $date=date_create($time);
    $date=date_format($date, $fomate);
    return $date;
}

?>
 