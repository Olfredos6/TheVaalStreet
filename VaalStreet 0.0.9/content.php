<?php
include("conect.php");
$isIn = true;


////////////////////////////////////////
$answer = $bdd->query('SELECT * FROM posts');
$a = 0;
while($data = $answer->fetch()){
	$a++;
	}
//echo $a;
///////////////////////////////////////
while($a != 0){
$answer = $bdd->query('SELECT * FROM posts WHERE ID = '.$a.'');
 $data = $answer->fetch();
	
	//$postID = $data['ID'];
	$postID = $data['ID'];
	$check = $data['timeChecked'];
	$post = $data['content'];
	$finalPost = $post;
	if(strlen($post) >= 450){
		$finalPost = substr($post,0,450).'...<a href="home.php">Read More</a>';
		}
	echo '
		<form action="home.php" method="get">
    	<table width="508" height="31" border="0" cellspacing="1">
  			<tr>
    			<td width="90" bgcolor="#FFFFFF" style="vertical-align:top" align="center"><img src="User.png" style="height:50px; width:50px"/><br/>'.$data['author'].'</td>
				<td width="410" bgcolor="#F8F8F8" style="font-size:12px">'.$finalPost.'</td>
  			</tr>
  			<tr>
   				<td width="50" bgcolor="#FFFFFF"></td>
    			<td width="450" bgcolor="#FFFFFF" align="right" style="font-size:10">'.$data['date'].'&nbsp;<b 	style="font-size:15">'.$check.'</b>people(s) liked this';
				if(isset($_SESSION['user'])){
					include("comment.php");
					echo $_SESSION['postID'];
				}
				echo '
				</form>
				</td>
  				</tr>
	 	</table>
		<br/>';
		$a--;
		}//End of WHILE
//END of While ISIN

?>