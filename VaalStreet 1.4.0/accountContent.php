if($_POST['text'] != ''){
		$text = $_POST['text'];
		$author= $_SESSION['user'];
		/*********************************************/
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
/*$req = $bdd->prepare('INSERT INTO posts(author, content, pictureContent)VALUES(:author,:content,:pictureContent)');
$req->execute(array('pictureContent' => $target_path,'author' => $author,'content' => $target_path));*/
$bdd->exec('INSERT INTO posts(author, content, pictureContent) VALUES(\''.$author.'\',\''.$text.'\',\''.$target_path.'\')');  				
				}
			else{exit("Error While uploading image on the server");} 

				}
		else{$bdd->exec('INSERT INTO posts(author, content) VALUES(\''.$author.'\',\''.$text.'\',\''.$target_path.'\')');}
		/********************************************/
		
		$_POST['text'] = '';
		header('Location : home.php');
	}
	else{echo '<b style="color:#F00">The post is empty, cannot be updated</b>';}