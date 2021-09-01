<?php
    include('../../config/config.php'); 
    $tenmuc= $_POST['tendanhmuc'];
    $thutu=$_POST['thutudanhmuc'];

    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO categories(ten,thutu) VALUE('".$tenmuc."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../index.php');
    }else{
        $id=$_GET['ID'];
        $xoa = "DELETE FROM categories WHERE id_cate='".$id."'";
        mysqli_query($mysqli, $xoa);
        header('Location:../index.php');    
    }
?>