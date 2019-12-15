<?php
if(!isset($_SESSION))
{
    session_start();
}
require_once('header.php');
if(isset($_SESSION['upload_message'])) {
    echo $_SESSION['upload_message'];
}
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

    <h1>Ready to create a class? Enter the student's info below.</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="create_container">
            Select image to upload:
            <input type="file" name="file_to_upload" id="fileToUpload">
            <input type="text" name="student_name" placeholder="Student Name">
            <input type="text" name="class_name" placeholder="Class Name">
            <input type="submit" value="Upload Image" name="submit">
        </div>
    </form>
    </form>
    </body>
	<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}
p {
  margin-top: 100px;
  margin-bottom: 100px;
  margin-right: 150px;
  margin-left: 80px;
}
</style>

</html>
