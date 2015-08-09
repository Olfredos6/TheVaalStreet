<?php

try
{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=vaalstreet', 'root', '');
}catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
if(isset($_POST['postPicture']) ){

echo '
<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="home.php">
	<table width="200" border="0">
  	<tr>
    	<td>
		<table width="0" border="0">
  <tr>
    <td><img src="'.$_SESSION['conectedUserPicture'].'"  height="50" width="60"/></td>
    <td><textarea name="text" cols="35" rows="3" >'.@$_POST['text'].'</textarea></td>
  </tr>
</table>
		</td>
  	</tr>
 	<tr>
    	<td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="file" name="postPicture" />
<input name="post" type="image" value="&nbsp;post it!" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636; vertical-align:bottom"/>
</form>
		</td>
  	</tr>
	</table>';
	}
else{
	echo'
	<form enctype="multipart/form-data" method="post" action="home.php">
	<table width="200" border="0">
  	<tr>
    	<td>
		<table width="0" border="0">
  <tr>
    <td><img src="'.$_SESSION['conectedUserPicture'].'"  height="50" width="60"/></td>
    <td><textarea name="text" cols="35" rows="3" >'.@$_POST['text'].'</textarea></td>
  </tr>
</table>
		</td>
  	</tr>
 	<tr>
    	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="postPicture" type="image" value="&nbsp;Add a Picture" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
<input name="post" type="image" value="&nbsp;post it!" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
</form>
		</td>
  	</tr>
	</table>';
}
if(isset($_POST['post']) ){
//////////////////////////////////
	function GetImageExtension($imagetype){
   		if(empty($imagetype)) return false;
	   		switch($imagetype)
	   		{
		   		case 'image/bmp': return '.bmp';
		   		case 'image/gif': return '.gif';
		   		case 'image/jpeg': return '.jpg';
		  		case 'image/png': return '.png';
		   		default: return false;
	  		}
 		}
//////////////////////////////////////
	$text = $_POST['text'];
	$author= $_SESSION['user'];
	
	if (!empty($_FILES["postPicture"]["name"])) {
		$file_name=$_FILES["postPicture"]["name"];
				$temp_name=$_FILES["postPicture"]["tmp_name"];
				$imgtype=$_FILES["postPicture"]["type"];
				$ext= GetImageExtension($imgtype);
				$imagename=$_FILES["postPicture"]["name"];
				$target_path = $imagename;
				
				if(move_uploaded_file($temp_name, $target_path)) {
					$name = $_SESSION['user'];
					echo $target_path;
					$bdd->exec('INSERT INTO posts(author, content, pictureContent) 
					VALUES(\''.$author.'\',\''.$text.'\',\''.$target_path.'\')');  				
				}
			else{exit("Error While uploading image on the server");} 

		}
	elseif($_POST['text'] != ''){
		$bdd->exec('INSERT INTO posts(author, content) VALUES(\''.$author.'\',\''.$text.'\')');
		}
	else{echo '<b style="color:#F00">The post is empty, cannot be updated</b>';}
}

?>