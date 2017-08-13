

<?php
include('connection.php');
//session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$user_full = mysqli_real_escape_string($conn, $_POST['user_full']);
	$user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

	$password = md5($password); 
	$query = "INSERT INTO user(user_name,user_pw,user_full,user_role) VALUES ('$name','$password','$user_full','$user_role')";
	$result = mysqli_query($conn,$query);
	echo "Created Successfully";
}

?>
<html>
<head><title>ADD USER</title></head>

<body>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	<label>Username</label>
	<input type="text" name="name" required/> <br/> <br/>
	<label>Password</label>
	<input type="password" name="password" required/> <br/><br/>
	<label>Fullname </label>
	<input type="text" name="user_full" /> <br/> <br/>
	<label>Role</label>
	<input type="text" name="user_role" required/>
	<p><input type="submit" name="submit" value="Register">&nbsp;<input type="reset" onClick="refresh()"></p>
	

</body>
