<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Company X</h2><br>
	<label><a href="home.php">Home</a> <a href="login.php">Login</a> <a href="reg.php">Registration</a></label>
  </div>
	 
<form action="profile.php" method="POST">
  	
  			<fieldset>
		<legend><h3>Login</h3>	</legend>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
	</fieldset>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="reg.php">Sign up</a>
  	</p>
	  </form>
	<?php
if(isset($_POST['login']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";	
$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Retrieve Data

	$password=$_POST['password'];
	$username=$_POST['username'];
	$sql="SELECT * FROM `student` WHERE username='$username' AND password='$password'";
	$result=$conn->query($sql);	
	 if ($result->num_rows > 0)
	{
		// while($row = $result->fetch_assoc()){
var_dump($result);
		 
			  $_SESSION["login"]=true;
			 
		header("location:profile.php");
	
		 //}
	}
	else
	{
		echo "No data found.<br/>";
	}

	
mysqli_close($conn);		
}


?>
	

</body>
</html>