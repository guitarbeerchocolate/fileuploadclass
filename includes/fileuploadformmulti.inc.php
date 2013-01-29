<form enctype="multipart/form-data" action="httphandler.class.php" method="POST">
<input name="method" type="hidden" value="multiuploadfile" />
<input name="webpath" type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
<input name="uploaded[]" id="uploaded" type="file" multiple="" /><br />
<input type="submit" value="Upload" />
</form>