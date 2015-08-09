<?php 
if(isset($_POST['login'])){include("login.php");}
elseif(isset($_POST['sign'])){include("sign.php");}
else{//prendre la police du echo pour tout la page content
  echo'<table border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td>
    <p style="color:#FFFFFF; font-size:16px; font-family:\'Comic Sans MS\', cursive">
	<b>V a a l S t r e e t ||||</b>
    </td>
    <td><form method="post" action="index.php">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="image" name="login" value="LogIn" style="color:#FFF; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/> | <input type="image" value="Sign In" name="sign" style="color:#FFF; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
</form>
</td>
  </tr>
</table>
 ';}
?>





