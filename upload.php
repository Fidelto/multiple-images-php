<?php
require './connection.php';
$ojectInstance=new multiple('multiple','localhost','root','');
if (isset($_POST['submitButton'])) {
   $name=$_POST['imageName'];
   $images=[];
  if (isset($_FILES['image'])) {
    for ($i=0; $i <count(($_FILES['image']['name'])) ; $i++) {
        $imageName=md5($_FILES['image']['name'][$i].rand(0,999)).'.jpg';
       move_uploaded_file($_FILES['image']['tmp_name'][$i],'images/'.$imageName);
       array_push($images,$imageName);
    }
  
  }
  if (!empty($name)) {
    $ojectInstance->insertProduct($name,$images);
  }else {
    echo "Fill the name.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Upload image</title>
</head>
<style>
    body{
        background: #f2f2f2;
    }
</style>
<body>
   <div class="upload-title">Upload image form</div> 
   <form method="post" enctype="multipart/form-data">
    <input type="text" name="imageName" placeholder="Image name">
    <input type="file" name="image[]" multiple>
    <input type="submit" value="Submit" name="submitButton">
   </form>
</body>
</html>