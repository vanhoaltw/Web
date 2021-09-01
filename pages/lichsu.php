<?php 
    session_start();
    include('../config/config.php');
    $lichsu=$_GET['ID_lichsu'];
    if(isset($_GET['ID_lichsu'])){
        $sql="SELECT * FROM donhang_kh WHERE ten_kh='".$lichsu."' ORDER BY id_cart DESC";
        $query=mysqli_query($mysqli, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H&T - lịch sử mua hàng</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
    <div class="body-main">    
        <div class="R1-container">
            <div class="R1-top">
                <table class="R1-top">
                <tr width="900px">
                    <td width="500px">
                        <h1><a href="../index.php"><b >H&T </b>fashion</a></h1>      
                    </td>
                    <td width="500px">
                        <ul class="R1-top-menu">
                            <li class="R1-home"><a href="../index.php">Cửa hàng</a></li>
                            <li class="R1-home"><a href="../lienhe.php">Liên hệ</a></li>
                            <li class="R1-about"><a href="../about_us.php?trang=aboutus">Giới thiệu</a></li>
                            <li class="R1-cart"><a href="cart.php?trang=giohang"><i class="fas fa-shopping-bag"></i></a></li>
                            <li class="R1-login dropdown" style="position:relative">
                                <?php
                                    if(isset($_SESSION['taikhoan_dk'])){
                                        echo "<span class='dropbtn'>";
                                        echo  $_SESSION['taikhoan_dk'];
                                        echo "<i class='fas fa-angle-right'></i></span>";
                                ?>
                                    <div class="dropdown-content">
                                        <a href="../index.php?quanli_dx=dangxuat" class="dangxuat">Đăng xuất</a>
                                        <a href="pages/lichsu.php" class="dangxuat">Lịch sử</a>
                                    </div>
                                <?php
                                    }else{
                                ?>
                                    <a href="Login/login.php" style="display:block">Login</a>
                                <?php
                                    }
                                ?>
                            </li>
                        </ul>
                    </td>
                </tr>
                </table>
            </div>
        </div>
        <!------------Đơn hàng đã mua------------>
        <div class="container-product_history">
            <h1>Lịch sử mua hàng</h1>
            <?php
                while($rows= mysqli_fetch_array($query)){
                    $sql_code="SELECT * FROM quanli_donhang,sanpham WHERE quanli_donhang.code_donhang='".$rows['code_donhang']."' AND sanpham.id=quanli_donhang.id_sanpham ORDER BY quanli_donhang.id_cart DESC ";
                    $query_code= mysqli_query($mysqli,$sql_code);
                    $tongtien=0;
            ?>
                <div class="wrap-product_history">
                <?php
                    while($row_sanpham=mysqli_fetch_array($query_code)){
                        $thanhtien=$row_sanpham['price']*$row_sanpham['soluong'];
                        $tongtien +=$thanhtien;
                ?>
                    <div class="detail-product_history">                 
                        <div class="content-product_history">
                            <div><img src="../IMAGE_PRODUCT/<?php echo $row_sanpham['image'] ?>" alt="" width="100px" height="100px"></div>
                            <div>
                                <ul>
                                    <li>Sản phẩm: <?php echo $row_sanpham['name'] ?></li>
                                    <li>Màu: <?php echo $row_sanpham['color'] ?>, Kích cỡ: <?php echo $row_sanpham['size'] ?></li>
                                    <li>Số lượng: <?php echo $row_sanpham['soluong'] ?></li>
                                </ul>
                            </div>
                            <div><u style="text-decoration:underline">đ</u><?php echo $row_sanpham['price'] ?></div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                    <div class="price-product_history">
                        <div>Đặt hàng vào lúc: <?php echo $rows['date_cart'] ?></div>
                        <div>
                            <div><u style="text-decoration:underline">đ</u><?php echo $tongtien ?></div>
                            <div>
                                <p class="status_history">Đang giao hàng</p>
                            </div>
                        </div>
                    </div>            
                </div>
<?php                    
                }
    }
?>
        </div>
        <!--------------------------------X---------------------------------->
    </div>  
</body>
</html>
