<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Doctors</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    </style>

</head>
<?php include 'Header.php'?>

<body>
<!--insert doctor code-->
<?php
require 'Connection.php';
if(isset($_POST["submit"])) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
        $myname = $_POST["id"];
        $filename = 'img/'. $_POST["id"].".jpg";
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
        //if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //*/
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
    if($uploadOk==1){
        $sql = "insert into rehab.doctor VALUES
    ('" . $_POST["id"] . "','" . $_POST["name"] . "','". $_POST["speciality"] . "','". $_POST["details"] ."','".$_FILES["fileToUpload"]["name"]."')";
        $conn->query($sql);
        echo "inserted";

    }
    /*$class="warning";
    if($error!=1)
    {
        $class="success";
    }*/

}
?>
<!--insert doctor code-->


</body>

<?php include 'Footer.php'?>

