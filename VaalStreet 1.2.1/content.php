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
				<div id=\'postId'.$postID.'\' style=\'padding:10px; background:#fff;\'>';
				
				
				
echo 'By <h3>'.$data['author'].'</h3>
    <table width="400" height="31" border="0" cellspacing="0" bgcolor="#643164">
  		<tr>
    		<td width="90" bgcolor="#FFFFFF" style="vertical-align:top" align="center"><br/></td>
			<td width="" bgcolor="#F8F8F8" style="font-size:14px">'.$post.'</td>
  		</tr>
  		<tr>
   			<td width="50" bgcolor="#FFFFFF"></td>
    		<td width="450" bgcolor="#FFFFFF" align="right" style="font-size:10">'.$data['date'].'&nbsp;<b 	style="font-size:15">'.$check.'</b>people(s) liked this
				</td>
  				</tr>
	 	</table>
		<img src="divide.png" width="420" height="5" />
		<br /><br />
			';
//Comments


$answer = $bdd->query('SELECT * FROM comments WHERE fromID = '.$postID.'');
	while($dt = $answer->fetch()){
	$comment = $dt['content'];
	$author = $dt['author'];
	$date = $dt['date'];
	echo '
		<form action="home.php" method="get">
    	<table width="300" height="20" border="0" cellspacing="1" bgcolor="#FFFFFF">
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

//comment form
echo '<form method="post" action="home.php">
<textarea name="commentText" cols="35" rows="3"></textarea>
    <input type="image" name="comment" value="LogIn" style="color:#FFF; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
</form>';
include("conect.php");

//////////////////////// INSERTING IN THE DATABASE
////////////////////////////////////////////////////////////////
if(isset($_POST['comment'])){
	if($_POST['commentText'] != ''){
		$text = $_POST['commentText'];
		$author= $_SESSION['user'];
		$bdd->exec('INSERT INTO comments(author, content, fromID) VALUES(\''.$author.'\',\''.$text.'\',\''.$postID.'\')');
		$_POST['commentText'] = '';
		//@header('Location : home.php');
	}
	else{echo '<script><b style="color:#F00">The post is empty, cannot be updated</b></script>';}
//@header('Location: home.php') ;
} //end of big if of posting a comment

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

