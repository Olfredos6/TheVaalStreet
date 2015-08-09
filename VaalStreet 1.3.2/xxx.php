<?php session_start();?>
<p style="font-size:16px; font-family:\'Comic Sans MS\', cursive">
<?php
include("conect.php");
if(isset($_GET['data'])){
	$_SESSION['postid'] = $_GET['data'] ;
	}
echo $_SESSION['postid'];

//////////////////////////////// MAIN POST ///////////////////////////////////
$answer = $bdd->query('SELECT * FROM posts WHERE ID = '.$_SESSION['postid'].'');
	$data = $answer->fetch();
	$post = $data['content'];
	$author = $data['author'];
	$date = $data['date'];
	$check = $data['timeChecked'];
	
echo 'By <h3>'.$data['author'].'</h3>
    <table width="400" height="31" border="0" cellspacing="0" bgcolor="#643164">
  		<tr>
    		<td width="90" bgcolor="#FFFFFF" style="vertical-align:top" align="center"><br/></td>
			<td width="" bgcolor="#F8F8F8" style="font-size:14px">'.$post.'</td>
  		</tr>
  		<tr>
   			<td width="50" bgcolor="#FFFFFF"></td>
			<form method="post" action="xxx.php">
    		<td width="450" bgcolor="#FFFFFF" align="right" style="font-size:10">
			'.$data['date'].'&nbsp;';

if(isset($_POST['addLike'])){
				if($_POST['addLike'] == '+1'){
					$updateLike = $data['timeChecked'];
					$updateLike++;
					$check = $updateLike;
					$bdd->exec('UPDATE posts SET timeChecked = '.$updateLike.' WHERE ID = '.$_SESSION['postid'].'');
					$bdd->exec('INSERT INTO likes(user, postid) 
					VALUES(\''.$_SESSION['user'].'\',\''.$_SESSION['postid'].'\')');
					}
			}

			
$answerLikes = $bdd->query('SELECT * FROM likes WHERE postid = '.$_SESSION['postid'].'');
$ok = 0;
while($dataLikes = $answerLikes->fetch()){
	if($dataLikes['user'] == $_SESSION['user']){
		if($dataLikes['postid'] == $_SESSION['postid']){$ok = 1; }
		}
	}	

echo '<b style="font-size:13">'.$check.'</b>&nbsp;people(s) liked this&nbsp;';
if($ok == 0){echo '<input type="image" name="addLike" style="color:#FFF; font-size:10px; font-family:\'Comic Sans MS\', cursive; background-color:#636" value="+1"  />';}		
				echo'
				
			</form>
	
				</td>
  				</tr>
	 	</table>
		<img src="divide.png" width="420" height="5" />
		<br /><br />';

///////////////////////////////////////////////DISPLAYS ALL THE COMMENTS
$answer = $bdd->query('SELECT * FROM comments WHERE fromID = '.$_SESSION['postid'].'');
	while($dt = $answer->fetch()){
	$comment = $dt['content'];
	$author = $dt['author'];
	$date = $dt['date'];
	echo '
	    
		<form action="home.php" method="get">
    	<table width="300" height="20" border="0" cellspacing="1" bgcolor="#FFFFFF" style="font-size:16px; font-family:\'Comic Sans MS\', cursive">
  			<tr>
    			<td width="90" bgcolor="FFFFFF" style="vertical-align:top" align="center"><img src="User.png" style="height:20px; width:20px"/><br/>'.$author.'</td>
				<td width="280" bgcolor="#E4C9E4" style="font-size:12px">'.$comment.'
				<br />
				</td>
  			</tr>
  			<tr>
   				<td width="50" bgcolor="#FFFFFF"></td>
    			<td width="450" bgcolor="#FFFFFF" align="left" style="font-size:10">&nbsp;'.$date.'
				</form>
				</td>
  				</tr>
	 	</table>
		<br/>';
		}
//////////////////////////// END OF IF $8GET IS SET ///////////////////





		//////////////////////// INSERTING IN THE DATABASE
/////////////////////////////////////////////////////////////////////////////////////////////////////////


if(isset($_POST['comment'])){
	if($_POST['commentText'] != ''){
		$text = $_POST['commentText'];
		$author= $_SESSION['user'];
		$bdd->exec('INSERT INTO comments(author, content, fromID) 
		VALUES(\''.$author.'\',\''.$text.'\',\''.$_SESSION['postid'].'\')');
		$_POST['commentText'] = '';
		
		$answer = $bdd->query('SELECT * FROM comments WHERE fromID = '.$_SESSION['postid'].'');
	while($dt = $answer->fetch()){
	$comment = $dt['content'];
	$author = $dt['author'];
	$date = $dt['date'];
	echo '
	    
		<form action="home.php" method="get">
    	<table width="300" height="20" border="0" cellspacing="1" bgcolor="#FFFFFF" style="font-size:16px; font-family:\'Comic Sans MS\', cursive">
  			<tr>
    			<td width="90" bgcolor="FFFFFF" style="vertical-align:top" align="center"><img src="User.png" style="height:20px; width:20px"/><br/>'.$author.'</td>
				<td width="280" bgcolor="#E4C9E4" style="font-size:12px">'.$comment.'
				<br />
				</td>
  			</tr>
  			<tr>
   				<td width="50" bgcolor="#FFFFFF"></td>
    			<td width="450" bgcolor="#FFFFFF" align="left" style="font-size:10">&nbsp;'.$date.'
				</form>
				</td>
  				</tr>
	 	</table>
		<br/>';
		}
	}
	else{echo '<b style="color:#000">The post is empty, cannot be updated</b>';}
} 

/////////////////////////////////////////////////////////////////////////////////////////////////////////


?>
<form method="post" action="xxx.php">
<textarea name="commentText" cols="35" rows="3"></textarea>
    <input type="image" name="comment" value="comment" style="color:#FFF; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
</form>
</p>

