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
input{
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 17px;
}

input[type=submit] {
    width: 10%;
    background-color: skyblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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

.li a.active {
    background-color:blue;
}
h3{
  color: white;
}

h2{
  color: white;
}
.div1{
background-color:white;position:fixed;top:0%;width:100%; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);height:8%;left:0%;z-index:5;
}
.div2{
position:absolute;left:0;top:50px;background-color:Black;z-index:0;color:white,width:100%;
}
.div3{
  position:fixed;left:0%;width:100%;height:100%;top:10%;background-color:Black;
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
  echo "<li class='li' style='float:right;'>"."<a href='../../main.php'>"."Home"."</a>"."</li>";
  echo "<li class='li' style='float:right;'>"."<a href='mail.php'>"."Mail"."</a>"."</li>";
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
<div class="div3">
  <?php if(isset($_SESSION['username'])){
    $user=$_SESSION['username'];
    echo "<h3>Welcome::$user</h3>";
  }
?>
<center>
<h2>Send Mail</h2>

  <form name=signin method=post action="">
<input type="text" name="name" value="" required placeholder="Movie Name"><br>
<input type="email" name="email" value="" required placeholder="To Address"><br>
<input type="submit" name="submit" value="Submit">
  </form>
  <?php
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $conn=mysqli_connect("localhost","root","","project");
    if(!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql="SELECT * from details where name='$name'";
    if($result=mysqli_query($conn,$sql)){
    $row=mysqli_fetch_assoc($result);
$string="Details:\n";
$string.="Name:".$row['name']."\n";
$string.="Year:".$row['year']."\n";
$string.="Cast:".$row['cast']."\n";
$string.="Rating:".$row['rating']."\n";
$string.="Language:".$row['language']."\n";
$string.="Type:".$row['type']."\n";
$string.="Director:".$row['producers'];

  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that
  date_default_timezone_set('Etc/UTC');

  require '../PHPMailerAutoload.php';

  //Create a new PHPMailer instance
  $mail = new PHPMailer;

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;

  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  // use
  // $mail->Host = gethostbyname('smtp.gmail.com');
  // if your network does not support SMTP over IPv6

  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';

  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "onlinemoviereview2@gmail.com";

  //Password to use for SMTP authentication
  $mail->Password = "projectmail";

  //Set who the message is to be sent from
  $mail->setFrom('onlinemoviereview2@gmail.com', 'MovieReview');

  //Set an alternative reply-to address
  $mail->addReplyTo('onlinemoviereview2@gmail.com', 'MovieReview');

  //Set who the message is to be sent to
  $mail->addAddress($email, $user);

  //Set the subject line
  $mail->Subject = 'Movie Details';

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($string, dirname(__FILE__));

  //Replace the plain text body with one created manually
  $mail->AltBody = 'This is a plain-text message body';

  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');

  //send the message, check for errors
  if (!$mail->send()) {
    echo "<h3>"."Invalid Movie"."</h3>";
  }
  else {
      echo "<h3>"."Movie details sent to mail!"."</h3>";
  }
  }

  }
  ?>
</center>
</div>
</body>
</html>
