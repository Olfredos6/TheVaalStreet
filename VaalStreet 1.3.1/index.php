<?php
session_start();
if(isset($_SESSION['user'])){header('Location: home.php') ;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#FFFFFF">
<table width="500" border="0" cellpadding="0" cellspacing="2" align="center" >
  <tr>
    <td bgcolor="#000000" height="70">
    <?php
	include("header.php");
	?>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    <table width="0" border="0">
  <tr>
    <td bgcolor="#CF9CCF" style="color:#FFF; appearance:icon; font-size:12px"> You have a story, We have got the platform. Here, thousands of people are waiting to read a story, a news, whatever from you and help it reaching others</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
	<?php
	echo "Here will be displayed three to five most liked posts";
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
