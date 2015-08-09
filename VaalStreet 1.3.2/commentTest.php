echo '<input type="image" value="Like" name="like" style="color:#FFF; font-size:10px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
<input type="image" value="Comment" name="'.$postID.'" style="color:#FFF; font-size:10px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>';
echo $postID;

if(isset($_POST[$postID])){
	echo '
	<br/>
	<textarea name="text" cols="30" rows="3"></textarea>';
	if(isset($_POST[$postID])){
		include("conect.php");
		$answer = $bdd->query('SELECT * FROM comments');
		while ($data = $answer->fetch()){
		echo'<table width="0" border="0" bgcolor="#FDFBFD">
  			<tr>
    			<td>'.$data['author'].'</td>
 			</tr>
  			<tr>
    			<td>'.$data['content'].'</td>
  			</tr>
			</table>';
		} //END of WHILE
		$text = $_POST['text'];
		$author= $_SESSION['user'];
		$bdd->exec('INSERT INTO comments(author, content) VALUES(\''.$author.'\',\''.$text.'\')');
		}
	}
    
    		if(isset($_POST['toPost'])){
			$_SESSION['postID'] = $data['ID'];
			header('Location : comment.php');
			}