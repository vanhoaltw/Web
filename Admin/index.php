<?php 
    session_start();
    if(!isset($_SESSION['taikhoan_admin'])){
        header('Location:../Login/login.php');
    }
    if(isset($_GET['quanli'])=='dangxuat'){
        unset($_SESSION['taikhoan_admin']);
        header('Location:../Login/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên</title></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/admin-css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="wrap-admin">
    <h1 class="tieude">Quản trị viên</h1>
    <h4 style="color:white; text-align:right; font-size:20px;border:none;" class="container">Bạn là " <?php if(isset($_SESSION['taikhoan_admin'])){ 
                                echo $_SESSION['taikhoan_admin'];}?> "</h4>
    <div  style="color:white; text-align:right; font-size:20px;border:none" class="container"><a href="index.php?quanli=dangxuat" style="text-decoration:none; color:white" class="btn btn-danger btn-sm">Log out</a></div>
    <div class="container admin_theme ">
        <?php
                include("../config/config.php");
                include("danhmucsanpham/categories.php");
                include("danhmucsanpham/them.php");
        ?>
    </div>
    <div class="container admin_theme ">
        <?php
                include("../config/config.php");
                include("quanlisanpham/categories.php");
                include("quanlisanpham/them.php");
        ?>
    </div>
    <div class="container admin_theme ">
        <h1>Danh sách quản trị viên</h1>
        <?php
            include("../config/config.php");
            include("quanlitaikhoan_ad/taikhoan_ad.php");
        ?>
    </div>
    <div class="container admin_theme ">
        <h1>Danh sách người dùng</h1>
        <?php
            include("../config/config.php");
            include("quanlitaikhoan_user/taikhoan_user.php");
        ?>
    </div>
    <div class="container admin_theme ">
        <h1>Quản lí đơn hàng</h1>
        <?php
            include("../config/config.php");
            include("quanli_donhang/quanli_donhang.php");
        ?>
    </div>
    </div>
</body>
</html>