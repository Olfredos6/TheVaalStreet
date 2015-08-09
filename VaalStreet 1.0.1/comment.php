
<?php
@session_start();
echo $data['ID'];
?>

<script></script>

<style>
	body{font:12px/1.2 Verdana, sans-serif; padding:0 10px;}
	a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}
	h2{font-size:13px; margin:15px 0 0 0;}
</style>
    
	<link rel="stylesheet" href="colorbox.css" />

	<script src="jquery.js"></script>
	<script src="jquery.colorbox.js"></script>
	<script>
		window.postID = "Nothing now";
		$(document).ready(function(){
			//$(".iframe").colorbox({iframe:true, width:"50%", height:"50%"});
			$(".iframe").colorbox({iframe:true, width:"50%", height:"50%", inline : true, href:"home.php"});
			$(".inline").colorbox({inline:true, width:"50%"});
		});
		//alert(postID);	
</script>
<?php
echo '
<form action="comment.php" method="post">
<input type="button" class="iframe" value="Take a look" name="'.@$data['ID'].'" style="color:#FFF; font-size:10px; font-family:\'Comic Sans MS\', cursive; background-color:#000 />
</form>';
?>