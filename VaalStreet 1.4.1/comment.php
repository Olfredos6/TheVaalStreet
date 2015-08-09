<?php
echo 
'<form action="comment.php" method="post">
<input name="send" type="button" value="comment" />
</form>';
/*
echo @$data['ID'];
$idFrom = $data['ID'];

	echo'
	<form id="form1" name="form1" method="post" action="comment.php">
	<table width="200" border="0">
  	<tr>
    	<td>
		<textarea name="text" cols="35" rows="3"></textarea>
		</td>
  	</tr>
 	<tr>
    	<td>
<input name="post" type="image" value="commente" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
</form>
		</td>
  	</tr>
	</table>';

if(isset($_POST['post']) ){
	if($_POST['text'] != ''){
		$text = $_POST['text'];
		$author= $_SESSION['user'];
		$bdd->exec('INSERT INTO comments(author, content, fromID) VALUES(\''.$author.'\',\''.$text.'\',\''.$idFrom.'\')');
		header('Location : home.php');
	}
	else{echo '<b style="color:#F00">The post is empty, cannot be updated</b>';}
}
*/
?>
