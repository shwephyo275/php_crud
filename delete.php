<?php
require_once("./db_connection.php");

// var_dump($_GET);
$id = $_GET['id'];
// echo $id;
$sql = "DELETE FROM work WHERE id = $id";

if(mysqli_query($conn, $sql)){
    header("location:read.php");
}else{
    echo "Something was wrong!";
}

?>