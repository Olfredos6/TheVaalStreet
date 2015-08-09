<?php 
if(isset($_POST['login'])){include("login.php");}
elseif(isset($_POST['sign'])){header('Location: sign.php');}
else{//prendre la police du echo pour tout la page content
  echo'<table border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td>
    <p style="color:#FFFFFF; font-size:16px; font-family:\'Comic Sans MS\', cursive">
	A<b style="font-size:18px"> u t h o r s |||| </b>
    </td>
    <td><form method="post" action="index.php">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="image" name="login" value="Log In" style="color:#FFF; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/> | <input type="image" value="Sign Up" name="sign" style="color:#FFF; font-size:16px; font-family:\'Comic Sans MS\', cursive; background-color:#636"/>
</form>
</td>
  </tr>
</table>
 ';}
?>





