<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/


class Thumbnail{
	
	private $name; //The directory and name of Image Ej. images/image.png
	private $imagename; //The final name of our thumb
	private $ext = array('.png','.jpeg','.gif'); //Extention png, gif, jpeg
	private $type; //if 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP.
	private $dir; //This you could change to fit
	private $width;
	private $height;
	private $newWidth;
	private $newHeight;
	private $info; //Info of getimagesize()
	private $img; //The image created form the given name or tmp_name
	private $thumb; //The thumbnail
	private $saved; //The image saved in the directory
	private $ratio;
	
		public function GetImageName() {
            return $this->imagename;
        }
        public function SetImageName($imagename) {
            $this->imagename = $imagename;
        }
		public function GetImageWidth() {
            return $this->width;
        }
		public function GetImageHeight() {
            return $this->height;
        }
        public function GetImageDir() {
            return $this->dir;
        }
        public function SetImageDir($dir) {
            $this->dir = $dir;
        }
		public function Unlink($dir,$file){
			
			unlink($dir.$file);
		
		}
	/**
	*Create an object Image
	*@param $name Could be an entire dirnae/filename or a resource from POST
	*@param $dir is the desired directory to save Image
	*/
	public function Image($name){
		
		$this->name = $name;
		$this->info = getimagesize($name);
		$this->width = $this->info[0];
		$this->height = $this->info[1]; 
		$this->type = $this->info[2];
				
		
		switch($this->type){
		
			case IMAGETYPE_PNG:
			$this->imagename = time().$this->ext[0];
			break;
			
			case IMAGETYPE_JPEG:
			$this->imagename = time().$this->ext[1];
			break;
			
			case IMAGETYPE_GIF:
			$this->imagename = time().$this->ext[2];
			break;
			
			default :
				header('Location: index');
				
		}
		
	}
	/**
	*	SaveImage
	*
	*/
	public function SaveImage($width,$height,$dir){
		
		
		switch($this->type){
			//Check if is a PNG
			case IMAGETYPE_PNG:
				$this->dir = $dir;	
				$this->img = imagecreatefrompng($this->name);
				$this->newWidth = $width;
				$this->newHeight = $height;
				$this->thumb = imagecreatetruecolor($this->newWidth, $this->newHeight); 
				imagealphablending($this->thumb, false); 
				imagesavealpha($this->thumb, true);   
				imagealphablending($this->img, true); 
				imagecopyresampled($this->thumb,$this->img,0,0,0,0,$this->newWidth,$this->newHeight,imagesx($this->img), imagesy($this->img));
				$this->saved = imagepng($this->thumb,$this->dir.$this->imagename);
								
			break;
			//Check if is a JPEG OR JPG
			case IMAGETYPE_JPEG:
				$this->dir = $dir;
				$this->img = imagecreatefromjpeg($this->name);
				$this->newWidth = $width;
				$this->newHeight = $height;
				$this->thumb = imagecreatetruecolor($this->newWidth, $this->newHeight);
				imagecopyresampled($this->thumb,$this->img,0,0,0,0,$this->newWidth,$this->newHeight,imagesx($this->img), imagesy($this->img));
				$this->saved = imagejpeg($this->thumb,$this->dir.$this->imagename, 90);
										
			break;
			//Check if is a GIF
			case IMAGETYPE_GIF:
				$this->dir = $dir;
				$this->img = imagecreatefromgif($this->name);
				$this->newWidth = $width;
				$this->newHeight = $height;
				$this->thumb = imagecreatetruecolor($this->newWidth, $this->newHeight);
				imagecopyresampled($this->thumb,$this->img,0,0,0,0,$this->newWidth,$this->newHeight,imagesx($this->img), imagesy($this->img));
				$this->saved = imagegif($this->thumb,$this->dir.$this->imagename);
					
					
			break;	
			
			default :
				header('Location: index');
		}//Switch
		
		if($this->saved){
			imagedestroy($this->img);
			imagedestroy($this->thumb);
			return true;
		}else{
			return false;
		}
	}
}
?>