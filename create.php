<?php 
    require_once('connect.php');

    $id = "";
    $username = "";
    $password = "";
    $name = "";

    $sql = "INSERT INTO `pos` (`id`, `username`, `password`, `name`) 
    VALUES ('".$id."' , '".$username."' , '".$password."' , '".$name."')";

    $result = $conn->query($sql);


?>