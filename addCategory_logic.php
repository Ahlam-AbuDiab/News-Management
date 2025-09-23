<?php
session_start();
$authId = $_SESSION["authUser"]["id"];
include "connectionToDataBase.php";
if($connection->error==false){
    if(isset($_POST["save"])){
        $categoryName= $_POST["categoryName"];
        $description =$_POST["description"];
        if(empty($categoryName)||empty($description)){
            header("Location:addCategory_ui.php");
        }else{
            $sql = "INSERT INTO categories (`categoryName`,`description`)
            VALUES('$categoryName','$description')";
            $result =$connection->query($sql);
            if($result==true){
                header("Location:viewCategories_ui.php?addCategory=1");
            }else{
                echo "Adding catrgory Fail";
            }        
        }
    }
}
?>