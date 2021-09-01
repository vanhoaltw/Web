<?php
    include("../../config/config.php");
    if(isset($_GET['donhang1'])=="dagiao" && isset($_GET['code_donhang'])){
        $id=$_GET['code_donhang'];
        $xoa = "DELETE FROM donhang_kh WHERE donhang_kh.code_donhang='".$id."'" ;
        $xoa2= "DELETE FROM quanli_donhang WHERE quanli_donhang.code_donhang='".$id."'" ;
        mysqli_query($mysqli, $xoa);
        mysqli_query($mysqli, $xoa2);
        header('Location:../index.php');  
        
    }

?>