<?php
session_start();
require_once('config.php');

  if(isset($_POST['update']))
  {
$id=$_GET['id'];
$finalvalue=$_POST['value'];
   
    $sql = "UPDATE recordsh
            SET rupees = '$finalvalue'
            WHERE id = '$id'; ";

    $result1 = $conn->query($sql);
echo "<script>alert('Complaint details updated successfully');</script>";	
    header("Location:account.php");
  }
 else 
{
    $result1="Some internal server error";
}


  
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

<div class="container">
 <form name="update" id="update" method="post"> 
<table>
    
    <tr height="50">
      <td><b>ID</b></td>
      <td><?php echo htmlentities($_GET['id']); ?></td>
    </tr>
    <tr>
	<td>Enter Final Value</td>
	<td><input name="value" type="text"/></td>
	</tr>
     

    <tr height="50">
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>

    
    <tr>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

 
</table>
 </form>
</div>
 <script>
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
  </script>
</body>
</html>

     