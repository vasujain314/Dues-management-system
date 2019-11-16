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
	<div class="container">
		<h1 style="text-align: center;">Your personal dues info. fill out 'em fast.</h1>
		<br/><br/><br/>
<?php
require_once("config.php");
if(isset($_POST['submit'])){


$rollnor=$_POST['rollno'];
$sql = "SELECT r.fromw,r.forw,r.rupees FROM recordsh as r WHERE r.rollno='$rollnor'";
$result = $conn->query($sql);
$id=1;
if ($result->num_rows > 0) {
    echo "<table class='table table-hover'>";
    echo "<th>id</th>";
    echo "<th>fromwho</th>";
    echo "<th>For What</th>";
    echo "<th>rupees</th>";
    while($row = $result->fetch_assoc()) {
              echo "<tr>
              <td>". $id++ . " </td>
              <td>". $row["fromw"]. " </td>
          <td>". $row["forw"]. " </td>
          <td>". $row["rupees"]. " </td>
         </tr>";
        }
    echo "</table>";
    }

 else 
{
    echo "0 results";
}

}

?>
</div>
</body>
</html>