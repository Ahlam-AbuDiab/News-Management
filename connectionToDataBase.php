<?php
$host = "localhost";
$username = "root";
$password = "12345";
$database_name ="NewsManagment";
$connection = new mysqli($host,$username,$password,$database_name);
/*
if($connection->error == true){
    echo "connection fail";
}else{
    echo "connected";
}
*/
?>