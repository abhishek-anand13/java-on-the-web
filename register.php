<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $email = mysql_real_escape_string($_POST['email']);
 $upass = md5(mysql_real_escape_string($_POST['pass']));
 
 if(mysql_query("INSERT INTO users(rollnumber,email,password) VALUES('$uname','$email','$upass')"))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <?php
	shell_exec('cd /var/www/html/minor/users;mkdir -m 777 '.$uname.'');
	
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="background.css" type="text/css" />
<link rel = "shortcut icon" href = "logo.png" />
</head>
<body>
<div id="header">
    <div id="left">
    <label>JAvaThride - Welcome to Java World</label>
    </div>
</div>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="Rollnumber" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
