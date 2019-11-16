<?php
session_start();
require_once("config.php");
$user=$_SESSION["USER"];

$id = $_GET['id'];


$sql = "DELETE FROM recordsh WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: account.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>