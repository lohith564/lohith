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
</style>
</head>
<body>
<div>
  <?php   session_start();
  if(isset($_SESSION["username"])){
    echo "<script type='text/javascript'>window.location.href='main.php';</script>";
  }?>
<h2>Online Movie Review</h2><div>
<div class="div2">
  <center><h2>Sign In</h2></center>
</div>
<div class="div3"><center>
  <form name=signin method=post action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="name" value="" required placeholder="Name">
<input type="password" name="pass" value="" required placeholder="Password">
<input type=text name=captcha required placeholder="Enter Captcha"><br>
<img src=capcha.php id="capt" ><br>
<input type="submit" name="submit" value="Login">
<input type="reset" name="reset" value="Reset">
  </form>
  <a href="signup.php" id="signup">Signup</a>
    <a href="PHPMailer-master/examples/ormail.php" id="fp" >Forgot Password?</a>
  <a href="main.php" id="back">GoBack</a>

</center>
</div>
<?php
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $conn=mysqli_connect("localhost","root","","project");
    if(!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql="SELECT password from users where name='$name'";
    if($result=mysqli_query($conn,$sql)){
    $row=mysqli_fetch_row($result);

    $flag=0;
    if(strcmp($pass,$row[0])=="true"){
      $flag=1;
      $cookie_name ="user";
$cookie_value = $name;
if(!isset($_COOKIE[$name])){
setcookie($cookie_name, $cookie_value, time()+(86400*30));
}

$_SESSION["username"]=$name;
    }
     else {
       $flag=2;
      echo "<script type='text/javascript'>alert(' Invalid Username or password!')</script>";
    }
}
mysqli_close($conn);
if($_POST['captcha'] == $_SESSION['my_captcha']){
  if($flag==1){
echo "<script type='text/javascript'>window.location.href='main.php';</script>";
}
}else {
  if($flag!==2){
echo "<script type='text/javascript'>alert(' Invalid Captcha!')</script>";
}
}
unset($_SESSION['my_captcha']);
}
?>
</body>
</html>
