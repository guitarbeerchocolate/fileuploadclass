<?php
class fileupload
{
	private $config = NULL;
	public $upload_file_location = NULL;
	public $webpath = NULL;
	public $files = NULL;
	function __construct()
	{
		$this->config = (object) parse_ini_file('config.ini', true);
		if($this->config->UPLOAD_FILE_LOCATION)
		{
			$this->upload_file_location = $this->config->UPLOAD_FILE_LOCATION;
		}
	}

	function upload()
	{
	    $target = $this->appendSlash($this->upload_file_location).basename($this->files['uploaded']['name']);    
	    move_uploaded_file($this->files['uploaded']['tmp_name'], $target);
	    header('Location:'.$this->webpath);	    
	}

	function appendSlash($s)
	{
		if(substr($s, -1) != '/')
		{
			$s .= '/';
		}
		return $s;
	}

	function __destruct()
	{
	
	}
}
?>