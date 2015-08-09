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
if(isset($_POST[$data['ID']])){$_SESSION['xID'] = $data['ID'];}
while($a != 0){
$answer = $bdd->query('SELECT * FROM posts WHERE ID = '.$a.'');
 $data = $answer->fetch();
	//$postID = $data['ID'];
	$_SESSION['postID'] = $data['ID'];
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
		<!-- This contains the hidden content for inline calls -->
		<script>
		var div = document.getElementById("textID");
		div.textContent = localStorage.getItem(\'postID\');
		</script>
		<div style=\'display:none\'>
		<div id=\'inline_content\' style=\'padding:10px; background:#fff;\'>
		Ok here is the shit
		<div id="textID"></div>
		</div>
		</div>
				</td>
  				</tr>
	 	</table>
		<br/>';
		$a--;
		}//End of WHILE
		echo '---------------------------------------------------------';
		$x = '<script>localStorage.getItem(\'postID\').textContent;</script>';
		echo $x;
//END of While ISIN

?>
<button onclick="
$.colorbox({iframe:true, width:"50%", height:"50%", href:"comment.php"});
">POP</button>
