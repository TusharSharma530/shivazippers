<?php $url = explode("/", $_GET['type']);
$gettype = $url[0];
$geturl = $url[1] ?? "";
$geturl1 = $url[2] ?? "";
$geturl2 = $url[3] ?? "";

if(empty($gettype)){
include("controller/login.php");
}else{
include("controller/$gettype.php");
}
include('controller/common.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=empty($geturl) ? (ucfirst(empty($gettype) ? "Login | Admin Panel" : $gettype)) : ucfirst($geturl);?></title>
<link rel="icon" type="image/x-icon" href="<?=$path;?>branch/images/fav.ico">

<!-- ========== Bootstrap CDN Link ========= -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- ========== ICONS CDN LINKS ========= -->
<!-- ===== Remix Icons CDN Link ==== -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
<!-- ===== Pe-7-icons CDN Link ==== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<!-- ===== Bootstrap Icons CDN Link ==== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- ===== Simple Line Icons CDN Link ==== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<!-- ========== ICONS CDN LINKS ========= -->

<!-- ========== Data Table Jquery UI Design ========= -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">


<!-- ========== Custom Css Link ========= -->
<link rel="stylesheet" href="<?=$adminpath;?>css/style.css">
<link rel="stylesheet" href="<?=$adminpath;?>css/responsive-style.css">

</head>
<body>
<?php 
// check if gettype is empty
if(empty($gettype)){
// check session is set or not
if(isset($_SESSION['username'])){
echo "<script>window.location.href='{$path}manager/dashboard'</script>";
exit();
}
// if gettype is empty so redirect login page
include('view/home.php');

}else{
// check session is set or not
if(!isset($_SESSION['username'])){
echo "<script>window.location.href='{$path}manager'</script>";
exit();
}
// if gettype is not empty so pages
?>
<div class="maincontainer">
<?php include('include/sidebar.php');
include("include/section.php"); ?>
</div>
<?php } ?>
<?php include('include/footer.php');?> 
</body>
</html>