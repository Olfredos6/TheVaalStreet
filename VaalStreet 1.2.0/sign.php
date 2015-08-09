<?php 
session_start();
$_SESSION['firstTime'] = true;
include('conect.php');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#FFFFFF">
<table width="500" border="0" cellpadding="0" cellspacing="2" align="center">
  <tr>
    <td bgcolor="#000000" height="70">
	<p style="color:#FFFFFF; font-size:16px; font-family:\'Comic Sans MS\', cursive">
	<b>V a a l S t r e e t ||||</b></p>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" align="center">
	<?php
	//Variables needed inside the form
	$amail = ''; $aname  = ''; $acopass  = ''; $apass  = '';
	
	if(isset($_POST['submit'])){
		
		if($_POST['pass'] == $_POST['passco']){
			if($_POST['mail'] == '' || $_POST['name']  == ''|| $_POST['name']  == ''|| $_POST['pass']  == ''|| $_POST['passco']  == '' ){
				if($_POST['mail'] == ''){$amail = '<br/>Please fill in the above';}
				if($_POST['name']  == ''){$aname = '<br/>Please fill in the above';}
				if($_POST['pass']  == ''){$apass = '<br/>Please fill in the above';}
				if($_POST['passco']  == ''){$acopass = '<br/>Please fill in the above';}
			}
			else{
			if($_POST['pass'] != $_POST['passco']){$acopass = 'Error';}
			else{
				$mail = $_POST['mail']; 
				$name = $_POST['name'];
				$pass = $_POST['pass'];
		
				echo $mail.$name.$pass;
				$req = $bdd->prepare('INSERT INTO users(screenName, mail, pass) VALUES(:name,:mail,:pass)');
				$req ->execute(array('name' => $name,
						 	 	'mail' => $mail, 
						 	 	'pass' => $pass));
				$_SESSION['user'] = $mail.'--'.$name;
				Header('Location:home.php');
				}
			}
		}//if of equality between the pass and the confirmation pass
			else{$acopass = '<br/>The above does not correspond to the password';}
	}
	
	//Print Form for registration
	echo '
	<form method="post">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="mail" style="color:#999">E-mail</label>
	<input type="text" name="mail" id="mail" value="'.@$_POST['mail'].'"/><b style="color:#F00">'.$amail.'</b>
    <br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;
	<label for="pass" style="color:#999">Password</label>
	<input type="password" name="pass" id="password" value="'.@$_POST['pass'].'"/><b style="color:#F00">'.$apass.'</b>
    <br/>
    <label for="passco" style="color:#999">Confirm Password</label>
    <input type="password" name="passco"/><b style="color:#F00" value="'.@$_POST['passco'].'">'.$acopass.'</b>
    <br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="name" style="color:#999">Screen name</label>
    <input type="text" name="name" id="name" /><b style="color:#F00" value="'.@$_POST['name'].'">'.$aname.'</b>
    <br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;
	<input name="submit" type="submit" value="Sign in" />
	</form>
	';
	 ?>
    </td>
  </tr>
  <tr>
    <td bgcolor="#000000" align="center">
    <?php
	include("footer.php");
	?>
    </td>
  </tr>
</table>
</body>
</html>