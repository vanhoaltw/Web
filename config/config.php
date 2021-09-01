<?php
    $mysqli = new mysqli("localhost", "root", "hoa2662001", "webtmdt");
    if($mysqli -> connect_errno){
        echo "Không thể kết nối tới database".$mysqli->connect_error;
        exit();
    }
?>