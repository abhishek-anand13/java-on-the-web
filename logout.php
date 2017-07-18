<?php
session_start();
shell_exec('cd ..;cd ..');
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
else if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['user']);
 header("Location: index.php");
}
?>
