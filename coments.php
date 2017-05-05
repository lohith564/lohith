<?php
if(isset($_POST['submit'])){
  session_start();
  if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
    $value=$_SESSION["movie"];
  }
  $detail=$_POST['comments'];
  $conn=mysqli_connect("localhost","root","","project");
  if(!$conn){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql1="INSERT INTO comentstab values('$user','$detail','$value')";
if(mysqli_query($conn,$sql1)){
header("Location: next.php");
}
}
?>
