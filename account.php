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
    <br/><br/><br/>

<?php
session_start();
require_once("config.php");
$user=$_SESSION["USER"];

   $sql = "SELECT * FROM admintable WHERE fromw='$user'";
   $result1 = $conn->query($sql);

    if ($result1->num_rows > 0) 
  {
    echo "<table class='table table-hover'>";
    echo "<th>NAME</th>";
    echo "<th>Roll Number</th>";
    echo "<th>For What</th>";
    echo "<th>rupees</th>";
    echo "<th>Contact</th>";
    while($row = $result1->fetch_assoc()) 
      {
        echo "<tr>
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
</body>
</html>