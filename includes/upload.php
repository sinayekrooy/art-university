<?php
	require_once("initialize.php");
?>

<?php

class Upload 
{ 
	private $location = "";
	protected static $size = 1024;
	private $name;
	private $file_name;
	private $types = array();
	private $allowed_type = array();        
	private $allowed_ext = array();

    function set_type($file_type)
    {
        $types = array();
        $types = array_merge((array)$types, (array)$file_type);
        $image_type = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
        $image_ex = array('png', 'gif', 'jpg', 'jpeg','PNG', 'GIF', 'JPG', 'JPEG');
        $zip_type = array("appliction/zip", "application/octet-stream", "application/x-zip", "application/x-zip-compressed",
                            "application/x-compress", "multipart/x-zip", "application/x-compressed");
        $zip_ex = array('zip');
        foreach ($types as $value)
        {
            switch ($value)
            {
            case 'image':
                $this->allowed_type = array_merge((array)$this->allowed_type, (array)$image_type);
                $this->allowed_ext = array_merge((array)$this->allowed_ext, (array)$image_ex);
                return true;
                //break;
            case 'zip':
                $this->allowed_type = array_merge((array)$this->allowed_type, (array)$zip_type);
                $this->allowed_ext = array_merge((array)$this->allowed_ext, (array)$zip_ex);
                return true;
                //break;
            default:
                return false;
                //break;
            }
        }
    }
    
    private function rand_name(){
        $con=LIB_PATH.DS."cont.dat";
        if (!($fp = fopen($con, "r"))) {
            die("can not open");
        }
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
    
    private function check_type($file)
    {
        $name = $file['name'];
        $file_type = $file['type'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        if(in_array($file_type, $this->allowed_type) and in_array($extension, $this->allowed_ext))
        {
            return true;            
        }        
    }
    
    function load($file)
    {
        $name = $file['name'];
        $this->name = $name;
        $tmp_name = $file['tmp_name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $rand_name = $this->rand_name().'.'.$extension;
        if($this->check_type($file))
        {
            if(move_uploaded_file($tmp_name,  $this->location.$rand_name))
            {
                $this->file_name = $rand_name;
                return true;
            }    
        }else{
            return false;
        }
    }
    
    function get_name()
    {
        return $this->name;
    }
    
    function get_file_name()
    {
        return $this->file_name;
    }
}/*

function upload_img($img){
	$name = $img['name'];
	$tmp_name = $img['tmp_name'];
	
	$allowed_types = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
	$allowed_extensions = array('png', 'gif', 'jpg', 'jpeg','PNG', 'GIF', 'JPG', 'JPEG');
        $type = $img['type'];
	$rand_name = randName().'.'.$extension; 
	$location = 'uploads/';
	  if(in_array($extension, $allowed_extensions) and in_array($type, $allowed_types)){
		  if(move_uploaded_file($tmp_name,$location.$rand_name)){
			  return $rand_name;	
		  }else{
			  return false;
		  }
	  }else{
		  echo 'File must be in "jpg" extension.';
	  }
}
function upload_resume($tmpl){
	$name = $tmpl['name'];
	$tmp_name = $tmpl['tmp_name'];
	$extension = pathinfo($name, PATHINFO_EXTENSION);
	$allowed_types = array("appliction/zip", "application/octet-stream", "application/x-zip", "application/x-zip-compressed",
					"application/x-compress", "multipart/x-zip", "application/x-compressed");
	$allowed_extensions = array('zip');
	$type = $tmpl['type'];
	$rand_name = randName().'.'.$extension; 
	$location = 'uploads/';
	  if(in_array($extension, $allowed_extensions) and  in_array($type, $allowed_types)){
		  if(move_uploaded_file($tmp_name,$location.$rand_name)){
			  return $rand_name;	
		  }else{
			  return false;
		  }
	  }else{
		  echo 'File must be in "zip" extension.';
	  }
}	connect();
	$query = "INSERT INTO  `test`.`form` (`ID`, `firstname`, `lastname`, `username`, `teachlevel`, `image`, `paypal`, `resume`)
			VALUES (NULL , '$firstname', '$lastname', '$username', '$teachLevel', '$img', '$paypal',  '$resume')";
	if($query_run = mysql_query($query) or die(mysql_error())){
		return true;
	}else{
		return false;
	}
}
function updateTable($firstname, $lastname, $username, $teachLevel, $img, $paypal, $resume){
	connect();
	$query = "INSERT INTO  `test`.`form` (`ID`, `firstname`, `lastname`, `username`, `teachlevel`, `image`, `paypal`, `resume`)
			VALUES (NULL , '$firstname', '$lastname', '$username', '$teachLevel', '$img', '$paypal',  '$resume')";
	if($query_run = mysql_query($query) or die(mysql_error())){
		return true;
	}else{
		return false;
	}
}*/
?>