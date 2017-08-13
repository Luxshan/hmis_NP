<?php
include('connection.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$user_full = mysqli_real_escape_string($conn, $_POST['user_full']);
	$user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

	$password = md5($password); 
	$query = "SELECT * FROM user WHERE user_name = '$name' AND user_pw = '$password'";
	$result = mysqli_query($conn,$query);
	$ret = mysqli_num_rows($result);
	
	if($ret == 1){
		header("location:admin_panel.php");
	}
	else{
		header("location:access_denied.php");
	}
}

?>
<html>
<body style="background-color:#E5E5E5">
<div align="center">
<form method="post">
<fieldset style="display: inline-flex; background-color: #D8D8D8;"><legend><font size="+2"><strong>Login Panel</strong></font></legend><p><b>UserName : </b><input type="text" name="name" required/>*</p>
<p><b>Password : </b><input type="password" name="password" required/>*</p><br>
<p><input type="submit" value="Login" name="login"/></p>
</fieldset>
</form>
</div>
</body>
</html> 
