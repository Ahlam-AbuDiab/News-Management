<?php
declare(strict_types=1);
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);
session_start();
$authId = $_SESSION["authUser"]["id"];
include "connectionToDataBase.php";
if($connection->error==false){
    if(isset($_POST["save"])){
        $title = $_POST["title"];
        $categoryName = $_POST["categoryName"];
        $details = $_POST["details"];
        $user_id = (int)($_SESSION['authUser']['id']);
        $dir = __DIR__ . '/uploads';
        $name   = time().'_'.basename($_FILES['image']['name']);
        $target = $dir.'/'.$name;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            die('Fail saving image');
        }
        $imagePath = 'uploads/'.$name;
         $stmt = $connection->prepare(
        "INSERT INTO news (title, categoryName, details, image, user_id)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssssi", $title, $categoryName, $details, $imagePath, $user_id);

    if ($stmt->execute()) {
        header("Location: viewNews_ui.php");
        exit;
        }else{
            echo "fail";
        }
    }
}
?>