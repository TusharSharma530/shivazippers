<section class="panel-content">
<header class="panel-header">
<div class="panel-header-left"></div>
<div class="panel-header-right">
	<a href="<?=$adminpath;?>settings" class="settings">Settings</a>
	<a href="<?=$adminpath;?>profile" class="profile">Profile</a>
	<a href="<?=$adminpath;?>logout" class="logout">Logout</a>
</div>
</header>
<div class="panel-inner-content">
<div class="container-fluid">

<div class="row">
<?php if(empty($geturl)){ include("view/$gettype.php"); }else{ include("view/{$geturl}{$gettype}.php"); } ?>
</div>

</div>
</div>
</section>
