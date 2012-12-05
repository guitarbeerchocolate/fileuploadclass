<?php
require_once 'classes/autoload.php';
class posthandler
{
  private $postObject;
  private $fileObject;
  function __construct($p, $f = NULL)
  {
    $this->postObject = (object) $p;
    $this->fileObject = $f;       
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

  function singleuploadfile()
  {
    $fu = new fileupload;    
    $fu->webpath = $this->postObject->webpath;
    $fu->files = $this->fileObject;    
    $fu->singleupload('1');
  }

  function multiuploadfile()
  {
    $fu = new fileupload;    
    $fu->webpath = $this->postObject->webpath;
    $fu->files = $this->fileObject;    
    $fu->multiupload('1');
  }
}
new posthandler($_POST, $_FILES);
?>