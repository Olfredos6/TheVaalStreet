<?php
include("conect.php");
	$postID = 8;
$answer = $bdd->query('SELECT * FROM comments WHERE fromID = '.$postID.'');
	while($dt = $answer->fetch()){
	$comment = $dt['content'];
	$author = $dt['author'];
	$date = $dt['date'];
	echo '
		<form action="home.php" method="get">
    	<table width="508" height="31" border="0" cellspacing="1">
  			<tr>
    			<td width="90" bgcolor="#FFFFFF" style="vertical-align:top" align="center"><img src="User.png" style="height:50px; width:50px"/><br/>'.$author.'</td>
				<td width="410" bgcolor="#F8F8F8" style="font-size:12px">'.$comment.'</td>
  			</tr>
  			<tr>
   				<td width="50" bgcolor="#FFFFFF"></td>
    			<td width="450" bgcolor="#FFFFFF" align="right" style="font-size:10">'.$date.'&nbsp;
				</form>
				</td>
  				</tr>
	 	</table>
		<br/>';
		}
$answer->closeCursor();

?>
