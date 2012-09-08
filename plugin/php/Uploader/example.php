<?php
include("Upload.php");

echo "<form enctype='multipart/form-data' action='index.php' method='POST'>"
."<input name='upload' type='file' /><input type='submit' value='Upload' />"
."</form>";


if($_FILES['upload']['tmp_name']) {
        $upload = new Upload();
        $upload->SetFileName($_FILES['upload']['name']);
        $upload->SetTempName($_FILES['upload']['tmp_name']);
        $upload->SetUploadDirectory("/var/www/upload/"); //Upload directory, this should be writable
        $upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); //Extensions that are allowed if none are set all extensions will be allowed.
        //$upload->SetEmail("Sidewinder@codecall.net"); //If this is set, an email will be sent each time a file is uploaded.
        //$upload->SetIsImage(true); //If this is set to be true, you can make use of the MaximumWidth and MaximumHeight functions.
        //$upload->SetMaximumWidth(60); // Maximum width of images
        //$upload->SetMaximumHeight(400); //Maximum height of images
        $upload->SetMaximumFileSize(300000); //Maximum file size in bytes, if this is not set, the value in your php.ini file will be the maximum value
        echo $upload->UploadFile();

}

?> 