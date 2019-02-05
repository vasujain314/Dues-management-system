<?php
session_start();
$result="";
require_once("config.php");

if(isset($_POST['login'])){
$user=$_POST['username'];
$pass=$_POST['password'];



$sql = "SELECT * FROM users WHERE user='$user' AND pass='$pass' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    $_SESSION["USER"] = $user;
        header("location: home.php");
    
}
 else 
{
    $result="Invalid username and Password";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style>
	body{
	background-image:url(images/loginback.png);
    background-repeat: no-repeat;
    background-size: cover;
	}
	.logoimg{
	height:150px;
	width=150px;
}

	</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-4">

<img class="logoimg" src="images/logo.jpg" align="right">

</div>
<div class="col-lg-8">
<br>
<h2 style="color:white;">National Institute Of Technology , Hamirpur.</h2>
<h3 style="color:white;">Dues Management System.</h3>
</div>
</div>
</div>
	<div class="container" style=" align-self:center; margin-top:100px;  ">
	<div class="row">
	<div class="col-lg-6" style="width:500px; height:300px;">
  <div class="card">
    <div class="card-body">
	<h3>ADMIN LOGIN</h3>
	<form name="contact-form" action="" method="post" id="contact-form">
    <div class="form-group">
    <label  for="Name">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username" required>
     </div>
     <div class="form-group">
       <label  for="exampleInputEmail1">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
     </div>
	 <button  class="btn btn-primary" name="login" value="login"  id="submit_form">Submit</button>
	 </br>
	 </br>
   <h5> <?= $result; ?>  </h5>
    </form>
	
	</div>
  </div>
  </div>
  <div class="col-lg-6" style="width:500px; ">
  <div class="card">
    <div class="card-body">
  <h3>Check if you are having dues.</h3>
  <br>
<form name="contact-form" action="check.php" method="post" id="contact-form">
<div class="form-group">
<label for="Name">Rollno.</label>
<input type="text" class="form-control" name="rollno" placeholder="Roll number" required>
</div>
<br><br>
<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">check</button>
<br><br><br/>

</form>
  </div>
  </div>
  </div>
  </div>
</div>


</body>
</html>