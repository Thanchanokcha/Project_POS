<?php
    require_once("connect.php")

    $sql = "SELECT * FROM `pos`";

    $result = $conn->query($sql) or die($conn->error);


?>