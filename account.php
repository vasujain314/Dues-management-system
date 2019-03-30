<!DOCTYPE html>
<html>
<head>
  <title>Dues against you.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <br/><br/>
<div class="container">
  <div class="col-lg-3">
    
    <form name="contact-form" action="" method="post" id="contact-form">
<div class="form-group">
<label for="id">ENTER ID TO DELETE</label>

<input type="text" class="form-control" name="id" placeholder="id" required>
<br/>
<button  type="submit" class="btn btn-primary" name="delete" value="Submit" id="submit_form">DELETE</button>
</div>
</form>
</div>
<div class="col-lg-3">
  <form name="contact-form" action="" method="post" id="contact-form">
<div class="form-group">
<label for="id">ENTER ID TO update</label>

<input type="text" class="form-control" name="id" placeholder="id" required>
<br/>
<label for="id">ENTER final value</label>

<input type="text" class="form-control" name="finalvalue" placeholder="finalvalue" required>
<br/>
<button  type="submit" class="btn btn-primary" name="update" value="Submit" id="submit_form">UPDATE</button>
</div>
</form>

</div>
<div class="col-lg-5"></div>
<div class="col-lg-1"  align="right"><button onclick="location.href = 'home.php';"  class="btn btn-primary">Home</button></div>

</div>

  <div class="container">
<h3 style="text-align: center;">Records</h3>
   

<?php
session_start();
require_once("config.php");
$user=$_SESSION["USER"];


   $sql = "SELECT * FROM admintable WHERE fromw='$user'";
   $result1 = $conn->query($sql);

    if ($result1->num_rows > 0) 
  {
    echo "<table class='table table-hover'>";
    echo "<th>UNIQUE ID</th>";
    echo "<th>NAME</th>";
    echo "<th>Roll Number</th>";
    echo "<th>For What</th>";
    echo "<th>rupees</th>";
    echo "<th>Contact</th>";
    
    while($row = $result1->fetch_assoc()) 
      {
        echo "<tr>
          <td>". $row["id"]. " </td>
          <td>". $row["name"]. " </td>
          <td>". $row["rollno"]. " </td>
          <td>". $row["forw"]. " </td>
          <td>". $row["rupees"]. " </td>
          <td>". $row["contact"]. " </td>
          
         </tr>";
         
        }
    echo "</table>";
    }

 else 
{
    $result="No dues";
} 

?>
</div>



<?php

require_once("config.php");
if(isset($_POST["delete"])){
$uniqueid=$_POST["id"];

if ($result1->num_rows > 0) {
    
    $sql = "DELETE FROM admintable WHERE id='$uniqueid' ";
    $result1 = $conn->query($sql); 
    header("Refresh:0");
}
 else 
{
    $result1="please check id";
}
}
?>
<?php
require_once("config.php");
if(isset($_POST["update"])){
  $uniqueid=$_POST["id"];
  $finalvalue=$_POST["finalvalue"];
if ($result1->num_rows > 0) {
    
    $sql = "UPDATE admintable
            SET rupees = '$finalvalue'
            WHERE id = '$uniqueid'; ";

    $result1 = $conn->query($sql); 
    header("Refresh:0");
}
 else 
{
    $result1="please check id";
}

}
?>
</body>
</html>