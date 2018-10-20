<?php
class PhotoClass
{
	function photo($newwidth,$newheight,$name)
	{
		if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))
		{
			if ($_FILES["file"]["error"] > 0)
				$msg = "Return Code: " . $_FILES["file"]["error"] . "<br />";
			else
			{   
				$photo=$name.".jpg";
				if (file_exists("upload/".$photo))
				{
					$xxff="upload/".$photo;
					unlink($xxff);
				}
				$uploadedfile = $_FILES['file']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
				list($width,$height)=getimagesize($uploadedfile);
				$tmp=imagecreatetruecolor($newwidth,$newheight);
				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
				$filename = "upload/". $_FILES['file']['name'];
				imagejpeg($tmp,$filename,100);
				imagedestroy($src);
				imagedestroy($tmp);
				$newname="upload/". $name.substr($filename,".jpg",4);
				rename($filename, $newname);
				return $newname;	  					
			}
		}
		else
			return "upload/default.jpg";
	}
}
?>