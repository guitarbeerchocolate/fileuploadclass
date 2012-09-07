<?php
class posthandler
{
  private $postObject;  
  function __construct($p)
  {
    $this->postObject = (object) $p;        
    if($this->postObject->method && (method_exists($this, $this->postObject->method)))
    {
      $evalStr = '$this->'.$this->postObject->method.'();';
      eval($evalStr);
    }
    else
    {
      echo 'Invalid method supplied';
    }
  }

  function uploadfile()
  {
    require_once 'classes/fileupload.class.php';
    $fu = new fileupload;    
    $fu->upload_file_location;
    $fu->webpath = $_POST['webpath'];
    $fu->files = $_FILES;
    $fu->upload();
  }
}
new posthandler($_POST);
?>