<div class="admin-login">
<div class="inner-login">
<div class="logo">
<?php if(empty($logo) && file_exists("../".$logo)){
echo "<img src='{$path}$logo' alt='$websitename'>";
}else{
	echo "<h3>$websitename</h3>";
} ?>
</div>
<div class="admin-form">
	<h4>Welcome Back!</h4>
<form method="POST" id="loginSubmit">
	<div class="fields">
		<input type="text" name="userName" class="form-control" placeholder="Username" required autofocus='on' autocomplete="off">
		<i class="bi bi-envelope"></i>
	</div>
	<div class="fields">
		<input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
		<i class="bi bi-eye-slash showhidepassword"></i>
	</div>
	<div class="fields-btn loginerr">
		<input type="submit" name="login" value="Login">
	</div>
</form>	
</div>
</div>
</div>