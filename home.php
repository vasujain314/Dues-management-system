
<?php 
session_start();
require_once("config.php");
if ($_SESSION["USER"]=="") {
	echo "please login first";
	exit;
}
$result="";

if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['rollno'])&& $_POST['rollno'] !=''))
{

$yourName = $conn->real_escape_string($_POST['name']);
$yourRollno = $conn->real_escape_string($_POST['rollno']);
$forwhat = $conn->real_escape_string($_POST['for']);
$yourMoney = $conn->real_escape_string($_POST['rupees']);
$contact = $conn->real_escape_string($_POST['contact']);

$sql="INSERT INTO admintable (fromw,name, rollno, forw, rupees,contact) VALUES ('".$_SESSION["USER"]."','".$yourName."','".$yourRollno."','".$forwhat."', '".$yourMoney."', '".$contact."')";

if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else{
    $result="DUE HAS BEEN SUBMITTED AGAINST ".$yourRollno." ";
}
}
?>


<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>


<body>
<br>

<div class="container" >
<div class="row">
<div class="col-lg-6" align="left";>
	<form action="account.php">
<button type="submit" class="btn btn-primary" name="account" value="account" id="submit_form">My account</button>
</form>
 </div>
<div class="col-lg-6" align="right";>
<form action="logout.php">
<button type="submit" class="btn btn-primary" name="logout" value="logout" id="submit_form">Logout</button>
</form>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-4">


<img class="logoimg" src="images/logo.jpg" align="right">
</div>
<div class="col-lg-8">
<br>
<h2 >National institute of technology, hamirpur.</h2>
<h3 >Dues Management System.</h3>
</div>
</div>
</div>
<br><br>





<div class="container-fluid" style="width: 94%;" >
<div class="row">
	<div class="col-sm-6" align="left">
<h2 >Submit due against someone.</h2>
<H4> <?= $result; ?> </H4>
<form name="contact-form" action="" method="post" id="contact-form">
<div class="form-group">
<label for="Name">Name</label>
<input type="text" class="form-control" name="name" placeholder="Name" required>
</div>
<div class="form-group">
<label  for="exampleInputEmail1">Roll number</label>
<input type="text" class="form-control" name="rollno" placeholder="roll number" required>
</div>
<div class="form-group">
<label for="reason">For what</label>
<input type="text" class="form-control" name="for" placeholder="for what" required>
</div>
<div class="form-group">
<label for="Phone">Money</label>
<input type="text" class="form-control" name="rupees" placeholder="rupees" required>
</div>
<div class="form-group">
<label  for="Phone">contact</label>
<input type="text" class="form-control" name="contact" placeholder="contact" required>
</div>
<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
</form>
</div>
<div class="col-sm-6"></div>
</div>
</div>


<br>


</body>
</html>