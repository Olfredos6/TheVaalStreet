<?php
session_start();
if(!isset($_SESSION['user'])){header('Location: index.php') ;}
$_SESSION['updateMessage'] = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#FFFFFF">
<table width="500" border="0" cellpadding="0" cellspacing="2" align="center">
  <tr>
    <td bgcolor="#000000" height="70">
<table border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td>
    <p style="color:#FFFFFF; font-size:16px; font-family:\'Comic Sans MS\', cursive">
	A<b style="font-size:18px"> u t h o r s |||| </b>
    </td>
    <td>
</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" align="right">
    <?php
	$page = "follow.php";	//this is the variable helping for loading pages 
							//in myAccount.php. On subscriptions by defaults
	//HERE WILL BE MONITORED MANY LINKS
	echo $_SESSION['user'].', Welcome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	include("menuHome.php");
	/////////////////////////////
	if(isset($_GET['logOut'])){
		session_destroy();
		header('Location: index.php');
		}
	///////////////////////////////////	
	elseif(isset($_GET['home'])){
		location("home.php");
		}
	/////////////////////////////////
	elseif(isset($_GET['myAccount']) || @$_SESSION['firstTime']){
		$_SESSION['firstTime']=false;
		$page = "settings.php";
		include("myAccount.php");//header('Location: myAccount.php');
		}
	/////////////////////////////////
	elseif(isset($_GET['notifications'])){
		//include("notifications.php");
		}
	////////////////////////////////
	//************** THIS PART PERTAINS TO LINKS FROM THE MYACCOUNT PAGE **************//
	/*elseif(isset($_GET[''])){
		$page = "page to load here";
		include("myAccount.php");
		}
	*/
	elseif(isset($_GET['follow'])){
		$page = "follow.php";
		include("myAccount.php");		
		}
		
	//***SUBMIT BUTTONS FROM THE SETTINGS FORM**///////////
		elseif(isset($_POST['updatePicture'])){			
			/******************************************************************************/
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
			 
			if (!empty($_FILES["uploadedImage"]["name"])) {
				$file_name=$_FILES["uploadedImage"]["name"];
				$temp_name=$_FILES["uploadedImage"]["tmp_name"];
				$imgtype=$_FILES["uploadedImage"]["type"];
				$ext= GetImageExtension($imgtype);
				$imagename=$_FILES["uploadedImage"]["name"];
				$target_path = $imagename;
				
				if(move_uploaded_file($temp_name, $target_path)) {
					include("conect.php");
					/*$query_upload=("INSERT into users ('images_path') 
									VALUES ('".$target_path."','".date("Y-m-d")."')");*/
					$name = $_SESSION['user'];				
					$req = $bdd->prepare('UPDATE users SET userPicture = :picturePath WHERE screenName = :name');
						$req->execute(array('picturePath' => $target_path, 'name' => $name));
						$_SESSION['conectedUserPicture'] = $target_path;
						$_SESSION['updateMessage'] = "Profil picture changed !";
						
					//mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  				
				}
			else{exit("Error While uploading image on the server");} 

				}
			/***************************************************************************/

 
			$page = "settings.php";
			include("myAccount.php");
		}
		
		
		
		elseif(isset($_POST['updatePassword'])){
			/*All the fiels must not be empty*/
			if($_POST['actualPass'] != "" && $_POST['newPasss'] != "" && $_POST['confPass'] != ""){
				$formActualPass = $_POST['actualPass'];
				$formNewPass = $_POST['newPasss'];
				$formNewPassConf = $_POST['confPass'];
			
				include("conect.php");
				$answer = $bdd->prepare(' SELECT pass FROM users WHERE screenName = ?');
				$answer ->execute(array($_SESSION['user']));
				$feedback = $answer-> fetch();
			
				if($formActualPass == $feedback['pass']){
					/************************************************************/
					if($formNewPass == $formNewPassConf){
						$name = $_SESSION['user'];
						$req = $bdd->prepare('UPDATE users SET pass = :mail WHERE screenName = :name');
						$req->execute(array('mail' => $formNewPass, 'name' => $name));
						$page = "settings.php";
						$_SESSION['updateMessage'] = "Password changed !";
						include("myAccount.php");
						}
					else{echo 'Not equal';}
					/***********************************************************/	
				}
			}//end of if-fiels-not-empty
			else{
					$page = "settings.php";
					include("myAccount.php");
					}
		}//END Elseif

		
		elseif(isset($_POST['updateMail'])){
		include("conect.php");
			if($_POST['newMail'] != ''){
				$mail = $_POST['newMail'];
				$name = $_SESSION['user'];
				$req = $bdd->prepare('UPDATE users SET mail = :mail WHERE screenName = :name');
				$req->execute(array('mail' => $mail, 'name' => $name));
			}		
		$page = "settings.php";
		include("myAccount.php");
		}
		
		
		
	elseif(isset($_GET['settings'])){
		$page = "settings.php";
		include("myAccount.php");
		}
	
	
	elseif(isset($_GET['myPosts'])){
		$page = "myposts.php";
		include("myAccount.php");
		}
	////////////////////////////////
	else{
		include("post.php");
		include("content.php");
		}

	?>
    </td>
  </tr>
  <tr>
    <td bgcolor="#000000" align="center">
    <?php
	include("footer.php");
	?>
    </td>
  </tr>
</table>

</body>
</html>
