<?php
  include "connectionToDataBase.php";
  if(isset($_GET['id'])){
    $id = (int)$_GET["id"];
    echo $id;
    $sql = "UPDATE news SET is_deleted = 1 WHERE id=$id";
    $result = $connection->query($sql);
    if($result==true){
        header("Location:viewDeletedNews_ui.php");
    }else{
        echo "Fail";
    }
  }
  ?>