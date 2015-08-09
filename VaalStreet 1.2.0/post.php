<?php

try
{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=vaalstreet', 'root', '');
}catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
	echo'
	<form id="form1" name="form1" method="post" action="home.php">
	<table width="200" border="0">
  	<tr>
    	<td>
		<textarea name="text" cols="35" rows="3"></textarea>
		</td>
  	</tr>
 	<tr>
    	<td>
<input name="post" type="image" value="post it!" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
<input name="imagePost" type="image" value="Post a photo" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
</form>
		</td>
  	</tr>
	</table>';
	
if(isset($_POST['post']) ){
	if($_POST['text'] != ''){
		$text = $_POST['text'];
		$author= $_SESSION['user'];
		$bdd->exec('INSERT INTO posts(author, content) VALUES(\''.$author.'\',\''.$text.'\')');
		$_POST['text'] = '';
		header('Location : home.php');
	}
	else{echo '<b style="color:#F00">The post is empty, cannot be updated</b>';}
}
?>