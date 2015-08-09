
<?php
if(isset($_POST['home'])){location("home.php");}
elseif(isset($_POST['notifications'])){echo'<p>Notifications</p>';}
elseif(isset($_POST['myAccount'])){location("index.php");}
elseif(isset($_POST['logOut'])){
	echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	session_destroy();
	header('location :index.php');
	}
//elseif(isset($_POST[''])){echo'<p></p>';}
else{
	//Post from the database
	//Get the number of ID
	/*$answer = $bdd->prepare(' SELECT ID FROM users');
	$answer ->execute(array($mail));
	$feedback = $answer-> fetch();*/
	//include("post.php");
	if(isset($_POST['post'])){
    $answer = $bdd->query('SELECT * FROM posts');
	while ($data = $answer->fetch()){
			echo $data['date'];
			echo $data['author'];
			echo $data['content'];
			echo $data['timeChecked'];
			}
		}
	}
?>
