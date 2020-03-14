<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Company X</h2><br>
	<label><a href="home.php">Home</a> <a href="login.php">Login</a> <a href="reg.php">Registration</a></label>
  </div>
	
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  		<fieldset>
		<legend><h3>Register</h3>	</legend>
	<div class="input-group">

	
	<label>Name</label>
	 <input type="text" name="name">

		
		<div class="input-group">
  	  <label>Email</label>
  	  <input type="text" name="email">
  	</div>
	
	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
	
	 	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
	
	</fieldset>
  <fieldset>
  <legend><h3>Gender</h3></legend>
  	<div class="input-group">
  	<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Other">Other
  	</div>
	</fieldset>
	 <fieldset>
	 <legend><h3>Date of Birthday</h3>	</legend>
	 <div class="input-group">
	 <input type="datetime" name="dob">
	 </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	
  	  <button type="submit" class="btn" name="reset">Reset</button>
  	</div>
  </form>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$name= $_POST['name'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password_1'];
$dob=$_POST['dob'];


if($name !=''||$username !=''||$email !=''||$gender!=''||$password!=''){


$sql = "INSERT INTO `student`(`name`, `username`, `password`, `email`, `dob`, `gender`)
VALUES ('$name','$username','$password','$email','$dob','$gender')";
}
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  
  
  
mysqli_close($conn);
?>
</body>
</html>