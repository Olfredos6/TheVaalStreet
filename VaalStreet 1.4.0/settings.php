<?php
//@session_start();
echo '<br/>User name : '.$_SESSION['user'].'<br/>';

include("conect.php");

$answer = $bdd->prepare(' SELECT * FROM users WHERE screenName = ?');
$answer ->execute(array($_SESSION['user']));
$feedback = $answer-> fetch();

//echo $feedback[''];

?>
<?php echo '<b style="color:#0F0">'.@$_SESSION['updateMessage'].'</b><br/>';?>
<br/>
<form enctype="multipart/form-data" action="home.php" method="post">
<p>
Change profile picture<br/>_____________________________________
<label for="picture" style="color:#999"></label>
<input type="file" name="uploadedImage" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636; text-decoration:inherit" name="updatePicture" value="change"/>
<br/><br/>

Change Password<br/>_____________________________________
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="actualPass" style="color:#999">Actual password</label>
<input type="text" name="actualPass" />
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="newPasss" style="color:#999">New password</label>
<input type="password" name="newPasss" />
<br/>
<label for="confPass" style="color:#999">Confirm new password</label>
<input type="password" name="confPass" />
<input type="submit" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636; text-decoration:inherit" name="updatePassword" value="change" />
<br/>
<br/>

<br/>
Change mail address<br/>_____________________________________<br/>
<?php echo '&nbsp;&nbspActual address mail : '.$feedback['mail'].'<br/>';?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="confPass" style="color:#999">New mail address</label>
<input type="text" name="newMail" />
<input type="submit" style="color:#FFF; font-size:12px; font-family:\'Comic Sans MS\', cursive; background-color:#636; text-decoration:inherit" name="updateMail" value="change" />
<br/>
</p>
</form>
