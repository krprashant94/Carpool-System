<?php
	include_once 'core/core.inc.php';

	if(isset($_FILES['image'])){
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

		$extensions= array("jpeg","jpg","png");

		if(in_array($file_ext, $extensions)=== false){
			$error="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size > '524288‬'){
			$error='File size must be less then 512 kb';
		}

		if(empty($error)==true){
			// move_uploaded_file($file_tmp, $source);

			$base = "images/userdata/user";
			$user_name = $_SESSION['user_id'];
			$size = array(128, 64, 32);
			$ext = ".jpg";
			foreach ($size as $dimension) {
				if ($file_ext == 'jpg' || $file_ext == 'jpeg') {
					$img = imagecreatefromjpeg($file_tmp);
				}elseif ($file_ext == 'png') {
					$img = imagecreatefrompng($file_tmp);
				}
				$imgresize = imagescale($img, $dimension, $dimension);
				imagejpeg($imgresize, $base.'_'.$user_name.'_'.$dimension.$ext);
				imagedestroy($imgresize);
			}
			header("Location: index.php");
		}else{
			print_r($error);
		}
	}
	
?>
<html>
	<body>
		<form method="POST" action="image_upload.php" enctype="multipart/form-data">
			<input type="file" name="image" />
			<input type="submit"/>
		</form>
	</body>
</html>