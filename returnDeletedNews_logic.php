<?php
  include "connectionToDataBase.php";
  if(isset($_GET['id'])){
    $id = (int)$_GET["id"];
    echo $id;
    $sql = "UPDATE news SET is_deleted = 0 WHERE id=$id";
    $result = $connection->query($sql);
    if($result==true){
        header("Location:viewNews_ui.php");
    }else{
        echo "Fail";
    }
  }
  ?>