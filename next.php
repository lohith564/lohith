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
hr{
  color: white;
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
.divh{
  align:center;
}
.li a:hover {
    background-color:black;
    color: white;
    text-decoration: underline;
}

.li a.active {
    background-color:blue;
}
h3{
  color: white;
}
.tab{
width:500px;font-size:20px;padding:40px 30px;color: white;
}
.div1{
background-color:white;position:fixed;top:0%;width:100%; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);height:8%;left:0%;z-index:5;
}
.div2{
position:absolute;left:0;width: 100%;top:50px;background-color:Black;z-index:0;color:white;
}
.div3{
  position:fixed;left:0%;width:100%;height: 7%;bottom:0%;background-color:white;
}
</style>
</head>
<?php if(!isset($_SESSION['username'])){"<style>"."textarea{disabled='yes';}"."</style>";}?>
<?php
if(isset($_GET['b'])){
$v=$_GET['b'];
session_start();
$_SESSION["movie"]=$v;
}
else{
  session_start();
}
$value=$_SESSION["movie"];
if(isset($_SESSION["username"])){
$user=$_SESSION["username"];
}
$conn=mysqli_connect("localhost","root","","project");
if(!$conn){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="SELECT * from details where name='$value'";
if($result=mysqli_query($conn,$sql)){
$row=mysqli_fetch_assoc($result);
}
?>
<body>
<div class="div1">
<ul class="ul">
  <?php
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
<table align="center" cellspacing=10px;cellpadding=50px; class="tab">
  <tr>
    <?php echo "<td colspan='2'>"."<img src=$value height=300 width=250>"."</td>";?>
  </tr>
  <tr>
<td>Title</td>
  <?php
echo "<td>".$row['name']."</td>";
  ?>
</tr>
<tr>
<td>Year</td>
<?php
echo "<td>".$row['year']."</td>";
?>
</tr>
<tr>
<td>Language</td>
<?php
echo "<td>".$row['language']."</td>";
?>
</tr>
<tr>
<td>Cast</td>
<?php
echo "<td>".$row['cast']."</td>";
?>
</tr>
<tr>
<td>Rating</td>
<?php
echo "<td>".$row['rating']."</td>";
?>
</tr>
<tr>
<td>Type</td>
<?php
echo "<td>".$row['type']."</td>";
?>
</tr>
<tr>
<td>Box-Office</td>
<?php
echo "<td>".$row['boxoffice']."</td>";
?>
</tr>
<tr>
<td>Director</td>
<?php
echo "<td>".$row['producers']."</td>";
?>
<tr>
<td>Description</td>
<?php
echo "<td>".$row['description']."</td>";
?>
</tr>


</table>
<hr > </hr>
<table align="center" class="tab">
  <tr>
    <td colspan="2">
      <h3><u>Comments:</u></h3>
    </td>
  </tr>
  <?php
//  if(isset($_GET['b'])||isset($_POST['submit']){
  $sql1="SELECT name,coments from comentstab where movie='$value'";
  if($result1=mysqli_query($conn,$sql1)){
while($row1=mysqli_fetch_assoc($result1)){
  echo "<tr>";
    echo "<td>".'User:'."</td>";
    echo "<td>".$row1['name']."</td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>".'Comments:'."</td>";
    echo "<td>".$row1['coments']."</td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td colspan='2'>"."<hr>"."</hr>"."</td>";
  echo "</tr>";
}
}
//}

   ?>
   <tr>
     <td colspan="2">
   <form method=post action="coments.php" >
      <?php
      if(!isset($_SESSION["username"])){ echo "<textarea  name='comments' rows='8' cols='55' placeholder='Login to enter coments' disabled></textarea>";
echo "<input type=submit name='submit' value='Submit' disabled>";
      }
      else{
    echo  "<textarea  name='comments' rows='8' cols='55' placeholder='Enter coments here...' required></textarea>";
    echo "<input type=submit name='submit' value='Submit'>";
  }
     ?>

      </form>
   </td>
   </tr>
</table>
</body>
</html>
