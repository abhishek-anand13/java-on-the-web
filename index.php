<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE rollnumber='$uname'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JAvaThride</title>
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
<td><input type="text" name="uname" placeholder="Your RollNumber" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
