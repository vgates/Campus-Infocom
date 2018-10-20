<?php
class photoClass
{
	function photo($newwidth,$newheight,$newname,$oldname)
	{
		if ($_FILES["file"]["error"] > 0)
    		$msg = "Return Code: " . $_FILES["file"]["error"] . "<br />";
  		else
    	{   
			$photo=$oldname.".jpg";
   	  		if (file_exists("upload/".$photo))
      		{
				$xxff="upload/".$photo;
	  			unlink($xxff);
      		}
			$uploadedfile = $_FILES['file']['tmp_name'];
			$src = imagecreatefromjpeg($uploadedfile);
			list($width,$height)=getimagesize($uploadedfile);
			//$newwidth=150;
			//$newheight=180;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
			$filename = "upload/". $newname;
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp); 
	  		return $filename;			
		}
	}
}
?>