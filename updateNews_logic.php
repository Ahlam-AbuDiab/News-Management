<?php
include "connectionToDataBase.php";
if($connection->error==false){
    if(isset($_POST["save"])){
      $id = (int)$_POST["id"];
      $title = $_POST["new_title"];
      $category =$_POST["new_categoryName"];
      $details = $_POST["new_details"];
      $imagePath = $_POST['current_image'] ?? null;
      if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $dir = __DIR__ . '/uploads';
      if (!is_dir($dir)) 
        mkdir($dir, 0775, true);
      $name   = time().'_'.basename($_FILES['image']['name']);
        $target = $dir.'/'.$name;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            die('Fail saving image');
        }
        $imagePath = 'uploads/'.$name;
  }
  $sql = "UPDATE news SET `title`='$title',`categoryName`='$category',
            `details`='$details',`image`='$imagePath' WHERE `id`='$id'";
      $result = $connection->query($sql);
      if($result==true){
        header("Location:viewNews_ui.php");
      }else{
        echo "Fail";
      }
    }
}
?>