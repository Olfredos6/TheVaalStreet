<style>
			body{font:12px/1.2 Verdana, sans-serif; padding:0 10px;}
			a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}
			h2{font-size:13px; margin:15px 0 0 0;}
		</style>
		<link rel="stylesheet" href="colorbox.css" />
		<script src="jquery.js"></script>
		<script src="jquery.colorbox.js"></script>
        <script>
			$(document).ready(function(){
				$(".inline").colorbox({inline:true, width:"50%"});});
		</script>

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
		$finalPost = substr($post,0,450).'...<a href="#postId'.$postID.'" class=\'inline\'>Read More</a>';
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
				echo'
					<form method="post" action="home.php">
					<a class=\'inline\' href="#postId'.$postID.'" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636">Comment</a>
					</form> 			
					';
				echo'
        		<div style=\'display:none\'>
				<div id=\'postId'.$postID.'\' style=\'padding:10px; background:#fff;\'>ID postId'.$postID.'';
				
				
				
echo '
    <table width="400" height="31" border="0" cellspacing="1">
  		<tr>
    		<td width="90" bgcolor="#FFFFFF" style="vertical-align:top" align="center"><img src="User.png" style="height:50px; width:50px"/><br/>'.$data['author'].'</td>
			<td width="" bgcolor="#F8F8F8" style="font-size:12px">'.$post.'</td>
  		</tr>
  		<tr>
   			<td width="50" bgcolor="#FFFFFF"></td>
    		<td width="450" bgcolor="#FFFFFF" align="right" style="font-size:10">'.$data['date'].'&nbsp;<b 	style="font-size:15">'.$check.'</b>people(s) liked this
				</td>
  				</tr>
	 	</table>
			';
//Comments

				echo '		</div>
				</div>';	
				}
				else{ echo '<div style=\'display:none\'><div id=\'postId'.$postID.'\' style=\'padding:10px; background:#fff; font-size:115;\'><img src="images_3.jpg" width="30" height="35" /> <b>Please log in to see more content</b></div></div>';}
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

