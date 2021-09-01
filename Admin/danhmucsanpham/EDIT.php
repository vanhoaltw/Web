<?php
    include("../../config/config.php");
    $tenmoi=$_POST['suaten'];
    if(isset ($_POST['suadanhmuc'])){
        $sql_Update="UPDATE categories SET ten ='".$tenmoi."' WHERE id_cate='$_GET[ID]'";
        mysqli_query($mysqli,$sql_Update);
        header('Location:../index.php');
    }
?>