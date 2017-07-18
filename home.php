<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
chdir('users');
chdir($userRow['rollnumber']);
//shell_exec("cd /var/www/html/minor/users/".$userRow['rollnumber']."");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title><?php echo $userRow['rollnumber']; ?></title>
      <link rel="stylesheet" href="style.css" type="text/css" />
      <link rel = "shortcut icon" href = "logo.png" />
    </head>
    <body>
       <div id="header">
          <div id="left">
            <label>JAvaThride</label>
          </div>
          <div id="right">
            <div id="content">
               Welcome <?php echo $userRow['rollnumber']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
            </div>
          </div>
       </div>
	   <div class = "a1" >
       <form  method="POST">
	          <div class = "aa" >
<dd> <input type="text" name="filename" placeholder = "Filename.java"  style="width:200px;" value="<?php echo htmlentities ($_POST['filename']); ?>"> <br> <br>
			 </div>
			  <div class = "bb">    
              <textarea  name= "code" placeholder = "Write code" rows="33" cols="70"><?php echo htmlentities ($_POST['code']); ?></textarea>
		      
		     
			  </div>

			   <div class  = "cc">
		     <textarea rows="6" cols="85" name= "stdin" placeholder = "Place STDIN here" ></textarea>
		     </div> 
		      <br>
		  
		  <div class = "dd">
		            <input style ="width:200px"; type="text" name="line" placeholder = "CommandLineArgument"> <br> <br> 
		  </div>
             
	      </div>
	         <?php
	 $result = "";
	 $resultline = "";
	 
	 if (isset($_POST['filename'])&&isset($_POST['stdin'])&&isset($_POST['line'])) {
	 
		$file="stdin.txt";
		$stdin = $_POST['stdin'];
		file_put_contents($file, $stdin);
	  $filename = $_POST['filename'];
	  $linefile="line.txt";
	 $line = $_POST['line'];
	 file_put_contents($linefile, $line);
	 
	 $myfiles = fopen("line.txt","r") or die ("Unable to open file!");
				$resultline =  fread($myfiles,filesize("line.txt"));
				fclose($myfiles);
	 //} else { $resultline=""; }
    $fh = fopen($filename, 'w');

       $code = $_POST['code'];
     fwrite($fh,$code);
     fclose($fh);
	    //shell_exec("export PATH="C:\Program Files\Java\jdk1.8.0_66\bin\:$PATH"");
		//putenv("PATH=C:\Program Files\Java\jdk1.8.0_66\bin");
	 // compile and run
	   shell_exec("javac ".$filename." 2>cresult.txt");
	   
	    $onlyfilename = strripos($filename,".");
		$onlyfilename = substr($filename, 0, $onlyfilename);
		if(filesize("cresult.txt")>0) {
				$myfile = fopen("cresult.txt","r") or die ("Unable to open file!");
				$result =  fread($myfile,filesize("cresult.txt"));
				fclose($myfile);
				}
		else {
		 shell_exec('cat '.$file.' | java '.$onlyfilename.' '.$resultline.' >result.txt');
        if(filesize("result.txt")>0) {
	  $myfile = fopen("result.txt","r") or die ("Unable to open file!");
	  $result =  fread($myfile,filesize("result.txt"));
	  fclose($myfile);
	   }
	  }
       
    
}
?>
	 <div class = "a2" >
	  <dd>
	  <textarea name= "output" rows="11" cols="85" readonly="readonly" Placeholder = "Output"><?php echo $result;  ?></textarea> <br>  </div>
	 <!-- <input type="submit" name="submit" value="run"> -->
	 <div class = "a3">
	 <button> Execute </button>
	  </div>
	  </form>
		<form action = "home.php">
	<div class= "a4">
 	<button> Clear </button>
	</div>
 	</form>
</body>
</html>
