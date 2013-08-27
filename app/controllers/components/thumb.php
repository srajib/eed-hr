<?php 
class ThumbComponent extends Object
{
    var $allowed_mime_types = array('image/jpeg','image/pjpeg','image/gif','image/png');
    var $image_location = 'images';
    var $errors = array();
    
    /**
     * Default width if not set
     */
    var $width = 150;
    /**
     * Default height if not set
     */
    //var $height = 50;

    var $zoom_crop = false;//do not zoom crop
    
    /**
     * The original image uploaded
     * @access private
     */
    var $file;
    var $controller;
    var $model;
    
    function startup( &$controller ) {
      $this->controller = $controller;
    } 
    
	function checkFile($file)
	{
		$this->file = $file;
		if(!in_array($this->file['type'],$this->allowed_mime_types)){
            $this->addError('Invalid File type: '.$this->file['type']);
            return false;
        }
		else
			return true;
	}
	
    function generateThumb($file, $original_location = null, $thumb_location = null)
	{
        if(!$file){
            $this->addError('non-existant file'.$filename);
            return false;
        }
        $this->file = $file;
       	if(!$this->file['size']){
            $this->addError('File Size is 0');
            return false;
        }
        if(!in_array($this->file['type'],$this->allowed_mime_types)){
            $this->addError('Invalid File type: '.$this->file['type']);
            return false;
        }
        if(!is_writable($original_location)){
            $this->addError('directory: '.$original_location.' is not writable.');
        }
				if(!is_writable($thumb_location)){
            $this->addError('directory: '.$thumb_location.' is not writable.');
        }
		$SourceFilename = $this->saveAs($this->file, $original_location);
		if($thumb_location != null)
		{
			App::import('Vendor', 'PhpThumb', array('file' => 'phpThumb'.DS.'phpthumb.class.php')); 
			$phpThumb = new phpThumb();
			$phpThumb->setSourceFilename($original_location.DS.$SourceFilename);
			$phpThumb->setParameter('w',$this->width);
			//$phpThumb->setParameter('h',$this->height);
			$phpThumb->setParameter('zc',$this->zoom_crop);
			//$phpThumb->setParameter('fltr','ric|5|5');
			//$phpThumb->setParameter('fltr', "wmt|The 8|3|BR|FFFFFF");
			//$phpThumb->setParameter('fltr', "fram|2");
			//$phpThumb->setParameter('fltr', "drop|3|2|c2c2c2|4");
			
			if($phpThumb->generateThumbnail())
			{
				if(!$phpThumb->RenderToFile($thumb_location.DS.$SourceFilename))
				{
					$this->addError('Could not render file to: '.$thumb_location.DS.$SourceFilename);
				}
			} 
			else
			{
				$this->addError('could not generate thumbnail');
			}
			// if we have any errors, remove any thumbnail that was generated and return false
			if(count($this->errors)>0)
			{
				if(file_exists($thumb_location.DS.$SourceFilename))
				{
					unlink($thumb_location.DS.$SourceFilename);
				}
				return false;
			} 
			else 
				return $SourceFilename;
		}
		else
			return $SourceFilename;
    }
	function saveAs($fileData = null, $path = null)
	{
		$no = 1;
    	$newFileName = $fileData['name'];
		$fileName = $fileData['name'];
    	while (file_exists($path.DS.$newFileName)) {
      		$no++;
      		$newFileName = substr_replace($fileName, "_$no.", strrpos($fileName, "."), 1);
    	}
		move_uploaded_file($fileData['tmp_name'], $path.DS.$newFileName);
		return $newFileName;
	}
    
    function addError($msg){
        $this->errors[] = $msg;
    }
    
}
?>