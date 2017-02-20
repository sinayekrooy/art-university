<?php
    require_once("includes/connection.php");
    require_once("includes/functions.php"); 
?>

<?php
    $title = $_POST['title'];
    $img = $_FILES['file'];
?>

<?php
function randName(){
	$con="cont.dat";
	if(!($fp=fopen($con, "r")))
	die ("can not open");
	$co=(int) fread ($fp , 20);
	fclose($fp);
	$co=$co+1;
	$fp=fopen ($con , "w");
	fwrite ($fp, $co);
	fclose($fp);
	$count=$co; 
	$name=$count."_".rand(11,99);
	return $name;
}
function upload_img($img){
	$name = $img['name'];
	$tmp_name = $img['tmp_name'];
	$extension = pathinfo($name, PATHINFO_EXTENSION);
	$allowed_types = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
	$allowed_extensions = array('png', 'gif', 'jpg', 'jpeg','PNG', 'GIF', 'JPG', 'JPEG');
	$type = $img['type'];
	$rand_name = randName().'.'.$extension; 
	$location = 'images/';
	  if(in_array($extension, $allowed_extensions) and in_array($type, $allowed_types)){
		  if(move_uploaded_file($tmp_name,$location.$rand_name)){
			  return $rand_name;	
		  }else{
			  return false;
		  }
	  }else{
              return false;
	  }
}

function imgSet ($title, $fileName)
{
    $query = "INSERT INTO `gallery` (`fileName`, `title`)
                        values ({$fileName}, {$title})";
    $imgSet = mysql_query($query);
    confirm_query($imgSet);
}
?>

<?php

?>

<form  action="#" method="POST" enctype="multipart/form-data">
    <label for="title">Image Title:</label><input name="title" id="title" type="text"><br />
    <label for="file">Filename:</label><input name="file" id="file" type="file"><br />
    <input type="submit" name="submit" value="Upload">
</form>