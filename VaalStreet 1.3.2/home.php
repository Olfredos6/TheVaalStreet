<?php
session_start();
if(!isset($_SESSION['user'])){header('Location: index.php') ;}
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
	<b>a u t h o r |||| </b>
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
	$page = "subscriptions.php";	//this is the variable helping for loading pages 
							//in myAccount.php. On subscriptions by defaults
	//HERE WILL BE MONITORED MANY LINKS
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
	elseif(isset($_GET['subscriptions'])){
		$page = "subscriptions.php";
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
