<?php
@session_start();
try
{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=vaalstreet', 'root', '');
}catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
if(isset($_POST['enter'])){
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	
	//$answer = $bdd->query('SELECT mail FROM users WHERE mail = '$_POST['mail']' ');
	
	$answer = $bdd->prepare(' SELECT pass,screenName,mail FROM users WHERE mail = ?');
	$answer ->execute(array($mail));
	$feedback = $answer-> fetch();
	if($feedback['pass'] == $pass){
		$_SESSION['user'] = $feedback['screenName'];
		$answer->closeCursor();
		header('Location: home.php');
		
		}
	else{
		echo '*******************************************\n********************';
		}
	}
	
else{
	echo '
	<p style="color:#666; font-family:\'Comic Sans MS\', cursive; font-size:10px">
<form id="form1" name="form1" method="post" action="login.php">
  <label for="mail" style="color:#999">E-mail</label>
  <input type="text" name="mail" id="mail"/>
  <label for="pass" style="color:#999">Password</label>
  <input type="password" name="pass" id="password" />
  <input name="enter" type="submit" value="LogIn" />
</form>
</p>';
}
