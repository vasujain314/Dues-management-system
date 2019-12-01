
<?php 
session_start();
require_once("config.php");
if ($_SESSION["USER"]=="") {
	echo "please login first";
	exit("Please login first");
}
$result="";

if(isset($_POST['rollno'])&& $_POST['rollno'] !='')
{


$yourRollno = $conn->real_escape_string($_POST['rollno']);
$forwhat = $conn->real_escape_string($_POST['for']);
$yourMoney = $conn->real_escape_string($_POST['rupees']);

$sql="INSERT INTO recordsh (fromw,rollno, forw, rupees) VALUES ('".$_SESSION["USER"]."','".$yourRollno."','".$forwhat."', '".$yourMoney."')";

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
<?php
require_once("config.php");
$result2="";
if(isset($_POST['uploadBtn'])){
	$filename=$_FILES['myFile']['name'];
	$fileTmpName=$_FILES['myFile']['tmp_name'];
	$handle= fopen($fileTmpName , 'r');
	$fileExtension= pathinfo($filename,PATHINFO_EXTENSION);
	

	while(($myData =fgetcsv($handle,1000,","))!==FALSE){
           $fromw=$_SESSION["USER"];
           $roll= $myData[0];
           $for= $myData[1];
           $rupees= $myData[2];
           
           $sql= "insert into recordsh (fromw,rollno,forw,rupees)
           values('".$fromw."','".$roll."','".$for."','".$rupees."') ";
           $result2 = $conn->query($sql);
		   $result2="CSV uploaded successfully";
	}
}

?>
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


<img class="logoimg" style="width: 100px; height: 100px;" src="images/logo.gif" align="right">
</div>
<div class="col-lg-8">
<br>
<h2 >Indian Institute of Information Technology, Una</h2>
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

<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
</form>
</div>
<div class="col-sm-6">
<br/><br/>
	<form action="" method="post" enctype="multipart/form-data">
	<h4><?= $result2;?></h4>
		<div class="form-group">
			<input type="file" name="myFile"  class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="uploadBtn">
		</div>
	</form>
</div>
</div>
</div>


<br>


</body>
</html>