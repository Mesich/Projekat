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
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	
}
else
{
if($old!=$pass)
{
	$msg="Neispravna stara lozinka";
}
elseif($p1!=$p2)
	{
		$msg="Nova lozinka se ne podudara !";
	}
	else
	{
		mysqli_query($set,"UPDATE admin SET password='$p2' WHERE aid='$aid'");
		$msg="Uspejšno promijenjena lozinka !";
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
<marquee class="clg" direction="right" behavior="alternate" scrollamount="3">ADMIN - PROMJENA LOZINKE</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Promijenite lozinku</span>
<br />
<br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="table" align="center">
<tr><td colspan="2" class="msg" align="center"><?php echo $msg;?></td></tr>
<tr><td class="labels">Stara lozinka :</td><td><input type="password" name="old" size="25" class="fields" placeholder="Unesite staru lozinku" required="required" /></td></tr>
<tr><td class="labels">Nova lozinka :</td><td><input type="password" name="p1" size="25" class="fields" placeholder="Unesite novu lozinku" required="required"  /></td></tr>
<tr><td class="labels">Potvrdite lozinku :</td><td><input type="password" name="p2" size="25"  class="fields" placeholder="Potvrdite lozinku" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Promjena lozinke" class="fields" /></td></tr>
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