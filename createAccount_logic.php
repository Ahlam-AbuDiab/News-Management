<?php
include "connectionToDataBase.php";
function ValidateData($data){
    $data = trim($data);
    $data =htmlspecialchars($data);
    return $data;
}
if($connection->connect_error==false){
    if(isset($_POST["create_account"])){
       
        $name = ValidateData($_POST["name"]);
        $email = ValidateData($_POST["email"]);
        $password = password_hash(ValidateData($_POST["password"]),PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (`name`,`email`, `password`)
            VALUES('$name','$email','$password')";
        $result = $connection->query($sql); 
        if($result==true){
            header("Location:loginPage_ui.php?statusCode=201");
            exit;
        }else{
            echo "Creating Account Fail";
        }
}
}

?>