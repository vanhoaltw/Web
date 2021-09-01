<?php
	session_start();
	if(isset($_GET['quanli'])=='dangxuat'){
        unset($_SESSION['taikhoan_dk']);
        header('Location:cart.php');
    }
	$count_sp=0;
	if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $cart_item){
	$count_sp += $cart_item['soluong'];}
	$_SESSION['count_cart']=$count_sp;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giỏ hàng</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
	
</body>
</html>
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
                            <li class="R1-cart"><a href="pages/cart.php?trang=giohang" ><i class="fas fa-shopping-bag"></i></a><span class="count_cart"><?php if(isset($_SESSION['cart'])){ echo $_SESSION['count_cart']; } ?></span></li>
                            <li class="R1-login dropdown" style="position:relative">
                            <?php
								if(isset($_SESSION['taikhoan_dk'])){
									echo "<span class='dropbtn'>";
                                    echo  $_SESSION['taikhoan_dk'];
                                    echo "<i class='fas fa-angle-right'></i></span>";
							?>
                                <div class="dropdown-content">
                                    <a href="cart.php?quanli=dangxuat" class="dangxuat">Đăng xuất</a>
                                    <a href="lichsu.php?ID_lichsu=<?php echo $_SESSION['id_khachhang'] ?>" class="dangxuat">Lịch sử</a>
                                </div>
							<?php
                                }else{
							?>
								<a href="../Login/login.php" style="display:block">Đăng nhập</a>
							<?php
								}
							?>
                            </li>
                        </ul>
                    </td>
                </tr>
                </table>
            </div>

<?php
	if(isset($_SESSION['cart'])){

	}
?>
<table widht="1300px"  class="cart_container">
  <tr>
    <th width="250px">Tên</th>
    <th width="150px">Giá</th> 
    <th width="150px">Hình ảnh</th>
	<th width="150px">Kích thước</th>
	<th width="150px">Màu</th>
	<th width="150px">Số lượng</th>
	<th width="150px">Thành tiền</th>
	<th width="150px">Tùy chọn</th>
  </tr>
  <?php
	if(isset($_SESSION['cart'])){
		$tongtien=0;
		foreach($_SESSION['cart'] as $cart_item){
			$thanhtien= $cart_item['soluong']*$cart_item['giasp'];
			$tongtien += $thanhtien;
  ?>
  <tr>
    <td><?php echo $cart_item['tensp'] ?></td>
    <td><u style="text-decoration:underline;">đ</u><?php echo $cart_item['giasp'] ?></td>
    <td><img src="../IMAGE_PRODUCT/<?php echo $cart_item['anhsp'] ?>" alt="" width="100px" height="100px"></td>
	<td><?php echo $cart_item['kichthuoc'] ?></td>
    <td><?php echo $cart_item['mausp'] ?></td>
    <td>
		<a href="giohang.php?tru=<?php echo $cart_item['id'] ?>" style="text-decoration:none; font-size:30px; font-weight:bold;"><i class="fas fa-caret-down btn_soluong"></i></a>
		<?php echo $cart_item['soluong'] ?>
		<a href="giohang.php?cong=<?php echo $cart_item['id'] ?>" style="text-decoration:none; font-size:30px; font-weight:bold;"><i class="fas fa-caret-up btn_soluong"></i></a>
	</td>
	<td><u style="text-decoration:underline;">đ</u><?php echo $thanhtien ?></td>
	<td><a href="giohang.php?xoa_id=<?php echo $cart_item['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>

  </tr>
<?php
	}
?>
	<tr>
		<td colspan="7" style="text-align:right; color:#d35400; font-size:25px; padding-right:40px;"><u style="text-decoration:underline;">đ</u><?php echo $tongtien ?></td>
		<td><a href="giohang.php?xoatatca=1" class="btn_deleteall">Xóa tất cả</a></td>
	</tr>
<?php
	}else{
?>
   <tr>
		<td colspan="6" style="color:red; font-size:20px;">Bạn chưa chọn mua sản phẩm nào!</td>
   </tr>
<?php
	}
?>
</table>
<div>
	<?php
		if(isset($_SESSION['taikhoan_dk']) ){
	?>
	<a href="dathang.php" class="btn_buy">Thanh toán</a>
	<?php
		}else{
	?>
	<p style="color:red; font-size:20px;">Vui lòng đăng nhập để thanh toán</p>
	<?php
		}
	?>
</div>
