<html>
<style>
.ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}
.ul1 {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.li {
    float: left;
    color: white;
    font-size:20px;
}

.li a {
    display:block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration:none;
}

.li a:hover {
    background-color:black;
    color: white;
    text-decoration: underline;
}
.tab{
width:500px;font-size:20px;padding:40px 30px;color: white;
}
.li a.active {
    background-color:blue;
}
h3{
  color: white;
}
.div1{
background-color:white;position:fixed;top:0%;width:100%; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);height:8%;left:0%;z-index:5;
}
.div2{
position:absolute;left:0;width: 100%;height:92%;top:50px;background-color:Black;z-index:0;color:white;
}
.div3{
  position:fixed;left:0%;width:100%;height:7%;bottom:0%;background-color:Black;
}
.b{
  background-color:black;
	cursor:pointer;
	font-family:Arial;
	font-size:15px;
  padding-right: 20px;
  color: white;
}
</style>
</head>
<body>
<div class="div1">
<ul class="ul">
<?php
session_start();
if(isset($_SESSION['username'])){
echo "<li class='li' style='float:right;'>"."<a href='logout.php'>"."Logout"."</a>"."</li>";
echo "<li class='li' style='float:right;'>"."<a href='contact.php'>"."ContactUs"."</a>"."</li>";
echo "<li class='li' style='float:right;'>"."<a href='aboutus.php'>"."About"."</a>"."</li>";
echo "<li class='li' style='float:right;'>"."<a href='main.php'>"."Home"."</a>"."</li>";
echo "<li class='li' style='float:right;'>"."<a href='PHPMailer-master/examples/mail.php'>"."Mail"."</a>"."</li>";
echo "<li class='li'>"."Online Movie Review"."</li>";
}
else{
  echo "<li class='li' style='float:right;'>"."<a href='login.php'>"."Login"."</a>"."</li>";
  echo "<li class='li' style='float:right;'>"."<a href='signup.php'>"."Signup"."</a>"."</li>";
  echo "<li class='li' style='float:right;'>"."<a href='contact.php'>"."ContactUs"."</a>"."</li>";
  echo "<li class='li' style='float:right;'>"."<a href='aboutus.php'>"."About"."</a>"."</li>";
  echo "<li class='li' style='float:right;'>"."<a href='main.php'>"."Home"."</a>"."</li>";
  echo "<li class='li'>"."Online Movie Review"."</li>";
}
?>
</ul>
</div>
<div class="div2">
  <?php if(isset($_SESSION['username'])){
    $user=$_SESSION['username'];
    echo "<h3>Welcome::$user</h3>";
  }
?>
<h3 align="center">About</h3>
<table align="center" cellspacing=10px;cellpadding=50px; class="tab">
  <tr>
    <td>
      <h2>Online Movie Review v1.0</h2>
    </td>
  </tr>
  <tr>
    <td>
      <h4>See ratings of new movies and <br>Post your coments here in this site</h4>
    </td>
  </tr>
</table>
</div>
</body>
</html>
