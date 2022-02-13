<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Uspješno dodano";
	}
	else
	{
		$msg="Knjiga već postoji";
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
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">DODAVANJE KNJIGA</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Dodajte knjigu u biblioteku</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">Knjiga : </td><td><input type="text" name="name" placeholder="Unesite ime knjige" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Autor : </td><td><input type="text" name="auth" placeholder="Unesite ime autora" size="25" class="fields" required="required"  /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Dodajte knjigu" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="adminhome.php" class="link">Nazad</a>
<br />
<br />

</div>
</div>
</body>
</html>