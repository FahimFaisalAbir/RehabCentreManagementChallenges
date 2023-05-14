<?php
include 'Connection.php';
if(isset($_POST["submit"])) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    // die($_POST["hideme"]);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType!=".JPG") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    /*$class="warning";
    if($error!=1)
    {
        $class="success";
    }*/
}

?>

<!DOCTYPE html>
<html>
<body>
<form action="File_upload.php" method="post" enctype="multipart/form-data">
    <div class="file-field big">
        <a class="btn-floating btn-lg pink lighten-1 mt-0 float-left">
            <i class="fa fa-paperclip" aria-hidden="true"></i>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
        </a>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload one or more files">
        </div>
        <input type="submit" value="Upload Image" name="submit">
    </div>
</form>

<!--<form action="File_upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <!-- <input type="hidden" name="hideme" value="bla bla"/>
    <input type="submit" value="Upload Image" name="submit">
</form>-->
   <div>
       <img src="uploads/Bean.jpg" alt="uploaded image">
   </div>
</body>
</html>