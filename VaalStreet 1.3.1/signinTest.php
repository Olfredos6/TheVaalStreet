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
	//*************Verify data*********************
	//Alert variables
	$amail = ''; $aname  = ''; $acopass  = ''; $apass  = '';
	if(isset($_POST['submit'])){
			//verifications
			if($_POST['mail'] == ''){$amail = 'Error';}
			if($_POST['name']  == ''){$aname = 'Error';}
			if($_POST['pass']  == ''){$apass = 'Error';}
			if($_POST['passco']  == ''){$acopass = 'Error';}
			if($_POST['pass'] != $_POST['passco']){$acopass = 'Error';}
			else{//***************************************************************
			
			$mail = $_POST['mail']; 
			$name = $_POST['name'];
			$pass = $_POST['pass'];
			
			//wrong data :
			
			//if good data,Connect to the database
			include("conect.php");
				
				//save data
				/*$req = $bdd->prepare('INSERT INTO users(screeName, mail,pass) VALUES(:screeName,:mail,:pass)');
				$req->execute(array(
				'screeName' => $name,
				'mail' => $mail,
				'pass' => $pass,
				));*/
				$sql = "INSERT INTO users (mail, auteur)
VALUES ('Titre super','auteur sympa')";
				 $_SESSION['user'] =  $_POST['name'];
				header('Location: home.php');
				//reidrect
				}//*************************************************END OF ELSE
		}
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