<?php
include("setting.php");
$name=$_POST['name'];
$email=$_POST['email'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
$sid=$_POST['sid'];
$pas=sha1($_POST['pass']);
if($name==NULL || $email==NULL || $sem==NULL || $branch==NULL || $sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($set,"INSERT INTO students(sid,name,branch,sem,password,email) VALUES('$sid','$name','$branch','$sem','$pas','$email')");
	if($sql)
	{
		$msg="Uspješna registracija";
	}
	else
	{
		$msg="Korisnik već postoji !";
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
<marquee class="clg" direction="right" behavior="alternate" scrollamount="2">REGISTRUJTE SE !</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Student Registracija</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Ime : </td><td><input type="text" name="name" class="fields" placeholder="Unesite puno ime" required="required" size="25" /></td></tr>
<tr><td class="labels">E-Mail ID : </td><td><input type="email" name="email" class="fields" placeholder="Unesite E-Mail ID" required="required" size="25" /></td></tr>
<tr><td class="labels">Semestar : </td>
<td>
<select name="sem" class="fields" required>
<option value="" disabled="disabled" selected="selected">- - Izaberite semestar - -</option>
<option value="1">Prvi Semestar</option>
<option value="2">Drugi Semestar</option>
<option value="3">Treći Semestar</option>
<option value="4">Četvrti Semestar</option>
<option value="5">Peti Semestar</option>
<option value="6">Šesti Semestar</option>
<option value="7">Sedmi Semestar</option>
<option value="8">Osmi Semestar</option>
</select>
</td></tr>

<tr><td class="labels">Struka : </td>
<td>
<select name="branch" class="fields" required>
<option value="" disabled="disabled" selected="selected">- - Izaberite struku - -</option>
<option value="Informacione tehnologije">Informacione tehnologije</option>
<option value="Informatika i računarstvo">Informatika i računarstvo</option>
<option value="Savremeno poslovanje">Savremeno poslovanje</option>
<option value="Bankarsko poslovanje">Bankarsko poslovanje</option>
<option value="Menadžment">Menadžment</option>
</select>
</td></tr>
<tr><td class="labels">Student ID : </td><td><input type="text" name="sid" class="fields" placeholder="Unesite Student ID" required="required" size="25" /></td></tr>
<tr><td class="labels">Lozinka : </td><td><input type="password" name="pass" class="fields" placeholder="Unesite lozinku" required="required" size="25" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Registracija" class="fields" /></td></tr>
</table>
</form><br />
<br />
<a href="index.php" class="link">Nazad</a>
<br />
<br />

</div>
</div>
</body>
</html>