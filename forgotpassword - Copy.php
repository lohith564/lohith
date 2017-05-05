<html>
<head><title>Signup</title>
<style>
.div2{
position:absolute;width:100%;left:0;top:60px;background-color:Black;z-index:0;color:white;
}
.div3{
  position:absolute;width:30%;left:35%;top:150px;
  border: 2px solid black;
  border-radius: 4px;
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
</style>
</head>
<body>
<div>
<h2>Online Movie Review</h2><div>
<div class="div2">
  <center><h2>Forgot Password</h2></center>
</div>
<div class="div3"><center>
  <form name=signin method=post action="PHPMailer-master/examples/ormail.php">
<input type="text" name="name" value="" required placeholder="Name">
<input type="submit" name="submit" value="Submit">
  </form>
  <a href="main.php" id="signup">GoBack</a>
</center>
</div>
</body>
</html>
