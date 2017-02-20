<?php

class Upload 
{ 
private $location = 'images/';
private $error;
private $size;
private $name;
private $file_name;
private $allowed_type = array();        
private $allowed_ext = array();

    function get_message()
    {
        switch ($this->error) {
            case 0:
                $msg = "Done.";
                return $msg;
            case 1:                
                $msg = "Type Did Not Match.";
                return $msg;
            case 2:                
                $msg = "Size Error";
                return $msg;
            case 3:                
                $msg = "Your choosen Type Dose Not Exist.";
                return $msg;
            case 4:                
                $msg = "Upload Was Not Complete";
                return $msg;
            default:
                return false;
        }
    }

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
                $this->error = 3;
                return false;
                //break;
            }
        }
    }
    
    function set_size($size = 2048)
    {
        $this->size = $size;
    }
    
    function check_size($file)
    {
        if($file['size'] > $this->size)
        {
            $this->error = 2;
            return false;
        }
        else
        {
            return true;
        }
    }
    
    function rand_name(){
        $con="cont.dat";
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
    
    function check_type($file)
    {
        $name = $file['name'];
        $file_type = $file['type'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        if(in_array($file_type, $this->allowed_type) and in_array($extension, $this->allowed_ext))
        {
            return true;            
        }
        else
        {
            $this->error = 1;
            return false;
        }       
    }
    
    function load($file)
    {
        $name = $file['name'];
        $this->name = $name;
        $tmp_name = $file['tmp_name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $rand_name = $this->rand_name().'.'.$extension;
        if($this->check_type($file) and $this->check_size($file))
        {
            if(move_uploaded_file($tmp_name,  $this->location.$rand_name))
            {
                $this->file_name = $rand_name;
                $this->error = 0;
                return true;
            }
            else
            {
                $this->error = 4;
                return false;
            }   
        }
        else
        {
            return false;
        }
    }
    
    function get_name()
    {
        return $this->file_name;
    }
    
    function get_file_name()
    {
        return $this->file_name;
    }
}

?>