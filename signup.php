<html>
<head><title>Signup</title>
<style>
.div2{
position:absolute;width:100%;left:0;top:60px;background-color:Black;z-index:0;color:white;
}
.div3{
  position:absolute;width:30%;left:35%;top:150px;
  border: 1px solid blue;
  border-radius: 2px;
    background-color: white;
    padding: 20px;
    color:white;
    box-sizing: border-box;
  font-size: 25px;
  font-family: areial;
}
input{
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 17px;
}

input[type=submit] {
    width: 30%;
    background-color: skyblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=reset] {
    width: 30%;
    background-color: skyblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button{
      width: 30%;
      background-color: skyblue;
      color: white;
      padding: 17px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
}
</style>
</head>
<body>
<div>
<h2>Online Movie Review</h2><div>
<div class="div2">
  <center><h2>Sign Up</h2></center>
</div>
<div class="div3"><center>
  <form name=signup method=post action="">
<input type="text" name="name" value="" required placeholder="Name">
<input type="password" name="pass" value="" required placeholder="Password">
<input type="email" name="email" value="" required placeholder="Email">
<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
  </form>
  <a href="main.php" name="back" value="GoBack">GoBack</a><nbsp>
  <a href="login.php" name="back" value="GoBack">Login</a>
</center>
</div>

<?php
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];

    $conn=mysqli_connect("localhost","root","","project");
    if(!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql="INSERT INTO users values('$name','$pass','$email')";
    if($result=mysqli_query($conn,$sql)){
        echo "<script type='text/javascript'>
        alert('Submitted successfully!');
          window.location.href='main.php';
        </script>";
    } else {
      echo "<script type='text/javascript'>alert(' Failed!')</script>";
    }
mysqli_close($conn);
}
?>
</div>
</body>
</html>
