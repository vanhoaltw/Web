<?php 
    session_start();
    include("../config/config.php");
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $time_cart=date('H:m:s - d/m/y',time());
    $code_donhang=rand(0,9999);
    $id_khachhang=$_SESSION['id_khachhang'];
    $sql="INSERT INTO donhang_kh(ten_kh, code_donhang,date_cart) VALUE('".$id_khachhang."', '".$code_donhang."','".$time_cart."')";
    $query_cart=mysqli_query($mysqli,$sql);
    if($query_cart){
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $sql_quanli="INSERT INTO quanli_donhang(code_donhang, id_sanpham, soluong) VALUE('".$code_donhang."','".$id_sanpham."', '".$soluong."')";
            $query_quanli=mysqli_query($mysqli,$sql_quanli);
        }
        unset($_SESSION['cart']);
        header("Location:cart.php");
    }

?>
