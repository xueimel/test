<?php
require_once 'inc/Dao.php';
if(!isset($_SESSION))
{
    session_start();
}
$dao = new Dao();
$class_exists = $dao->class_exists($_POST['class_name']);
if (empty($class_exists)){
    $dao->insert_class($_SESSION['class_name']);
}
$_SESSION['upload_message'] = "";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['upload_message'] = "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['upload_message'] =  $_SESSION['upload_message'] ."<br>File already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file_to_upload"]["size"] > 500000) {
    $_SESSION['upload_message'] =  $_SESSION['upload_message'] ."<br>Your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $_SESSION['upload_message'] =  $_SESSION['upload_message'] ."<br>Only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['upload_message'] =  $_SESSION['upload_message']."<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
        $image =file_get_contents("uploads\\".$_FILES['file_to_upload']['name']);
        $dao->insert_new_student($_POST['class_name'], $_POST['student_name'], $image);
        $_SESSION['upload_message'] = $_SESSION['upload_message'] ."<br>The file ". basename( $_FILES["file_to_upload"]["name"]). " has been uploaded.";
        header("Location: createNewClass.php");
        exit();
    } else {
        $_SESSION['upload_message'] = $_SESSION['upload_message'] ."<br>Sorry, there was an error uploading your file.";
        header("Location: createNewClass.php");
        exit();
    }
}
header("Location: createNewClass.php");
exit();

?>