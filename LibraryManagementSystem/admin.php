<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{
	header("location:home.php");
}
$aid=mysqli_real_escape_string($set,$_POST['aid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($aid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=sha1($pass);
	$sql=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:adminhome.php");
	}
	else
	{
		$msg="Neispravni podatci";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online biblioteka</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Online biblioteka</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">ADMIN PRIJAVA</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Admin Prijava</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Admin ID : </td><td><input type="text" name="aid" class="fields" size="25" placeholder="Unesite Admin ID" required="required" /></td></tr>
<tr><td class="labels">Lozinka : </td><td><input type="password" name="pass" class="fields" size="25" placeholder="Unesite lozinku" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Prijava" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="index.php" class="link">Početna stranica</a>
<br />
<br />

</div>
</div>
</body>
</html>