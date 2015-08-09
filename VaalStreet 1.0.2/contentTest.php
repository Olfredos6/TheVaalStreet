<?php
include("conect.php");
if(isset($_POST["home"])){location("home.php");}
elseif(isset($_POST['notifications'])){echo'<p>Notifications</p>';}
elseif(isset($_POST['myAccount'])){echo'<p>myAccount</p>';}
elseif(isset($_POST['logOut'])){
	session_destroy();
	header('Location: index.php');
	}
//elseif(isset($_POST[''])){echo'<p></p>';}
else{}
	//Post from the database
	//Get the number of ID
	/*$answer = $bdd->prepare(' SELECT ID FROM users');
	$answer ->execute(array($mail));
	$feedback = $answer-> fetch();*/
	if(isset($_SESSION['user'])){include("post.php");}
	//if(isset($_POST['post'])){
    $answer = $bdd->query('SELECT * FROM posts');
	while ($data = $answer->fetch()){
		$postID = $data['ID'];
		$check = $data['timeChecked'];
		
			echo '<form action="home.php" method="post"><table width="0" border="0">
  <tr>
    <td width="497">
    <table width="508" height="31" border="0" cellspacing="1">
  						<tr>
    						<td width="50" bgcolor="#FFFFFF" style="vertical-align:top">'.$data['author'].'</td>
    						<td width="450" bgcolor="#F8F8F8">'.$data['content'].'</td>
  						</tr>
  						<tr>
   						  <td width="50" bgcolor="#FFFFFF"></td>
    						<td width="450" bgcolor="#FFFFFF" align="right" style="font-size:10">'.$data['date'].'&nbsp;<b 	style="font-size:15">';
	if(isset($_POST[$postID])){
	$check++;
	$bdd->exec('UPDATE posts SET timeChecked = '.$check.' WHERE ID = '.$postID.'');
	//echo $check;
	echo $check.'</b>people(s) liked this.&nbsp; ';}
	else{echo $check.'</b>people(s) liked this.&nbsp;<input type="image" value="Like" name="'.$postID.'" style="color:#FFF; font-size:10px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>';}
	echo '</td>
  						</tr>
	  </table>
    </td>
  </tr>
</table>
</form>
<br/>';
$answer->closeCursor();
	
	}
?>
