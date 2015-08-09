<?php
session_start();
?>
<!DOCT
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
	<b>V a a l S t r e e t |||| </b>
    </td>
    <td>
</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" align="right">
    <form method="post" action="home.php">
    <input type="image" name="Home" value="Home" style="color: #7D7D7D; font-size: 16px; font-family: \'Comic Sans MS\', cursive; background-color: #000" border="0" />&nbsp;
    <input type="image" name="notifications" value="Notifications" style="color:#7D7D7D; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#000"/>&nbsp;
    <input type="image" name="myAccount" value="My account" style="color: #7D7D7D; font-size: 16px; font-family: \'Comic Sans MS\', cursive; background-color: #000"/>&nbsp;
    <input type="image" name="logOut" value="Log out" style="color:#7D7D7D; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#000"/>&nbsp;
    </form>
    <?php
	include("post.php");
	include("content.php");
	echo $_SESSION['user'];
	echo 'xxx';
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
