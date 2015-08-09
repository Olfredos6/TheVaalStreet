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
				$(".iframe").colorbox({iframe:true,inline:true,  width:"47%", height:"90%"});
				$(".inline").colorbox({inline:true, width:"50%",
				onClosed:function(){ window.location.reload(); }});});
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
$answer = $bdd->query('SELECT * FROM posts ORDER BY timeChecked DESC');
while( $data = $answer->fetch()){
	//$postID = $data['ID'];
	$postID = $data['ID'];
	$check = $data['timeChecked'];
	$post = $data['content'];
	$finalPost = $post;
	if(strlen($post) >= 450){
		$finalPost = substr($post,0,450).'...<a href="xxx.php?data='.$postID.'" class="iframe">Read More</a>';
		}
	$req = $bdd->prepare(' SELECT userPicture FROM users WHERE screenName = ?');
				$req ->execute(array($data['author']));
				$feedback = $req-> fetch();
				/*$answer->closeCursor();*/
	echo '
		<form action="home.php" method="get">
    	<table width="508" height="31" border="0" cellspacing="1">
  			<tr>
    			<td width="90" bgcolor="#FFFFFF" style="vertical-align:top" align="center">
				<img src="'.$feedback['userPicture'].'" style="height:50px; width:50px"/><br/>'.$data['author'].'</td>
				<td width="410" bgcolor="#F8F8F8" style="font-size:12px">
				'.$finalPost.'<br/><br/>
				<img src="'.$data['pictureContent'].'" style="max-width:374px; max-height:280px%"/>
				</td>
  			</tr>
  			<tr>
   				<td width="50" bgcolor="#FFFFFF"></td>
    			<td width="450" bgcolor="#FFFFFF" align="right" style="font-size:10">'.$data['date'].'&nbsp;<b 	style="font-size:15">| '.$check.' </b>people(s) liked this';
				if(isset($_SESSION['user'])){
				echo'
					<form method="post" action="home.php">
					<a href="xxx.php?data='.$postID.'" class="iframe" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636">&nbsp;comment </a>
					</form> 		
				</form>
				</td>
  				</tr>
	 	</table>
		<br/>';}
		}//End of WHILE
//END of While ISIN
?>