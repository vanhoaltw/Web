<?php
    include('config/config.php');
    session_start();
    if(isset($_GET['quanli'])=='dangxuat'){
        unset($_SESSION['taikhoan_dk']);
        header('Location:about_us.php');
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
    <title>H&T fashion</title>
    <link rel="stylesheet" href="CSS/index.css">
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
                            <h1><a href="index.php"><b >H&T </b>fashion</a></h1>      
                        </td>
                        <td width="500px">
                            <ul class="R1-top-menu">
                                <li class="R1-home"><a href="index.php">Cửa hàng</a></li>
                                <li class="R1-home" style="box-sizing:border-box; background:red"><a href="lienhe.php" style="color:white">Liên hệ</a></li>
                                <li class="R1-about"><a href="about_us.php?trang=aboutus">Giới thiệu</a></li>
                                <li class="R1-cart"><a href="pages/cart.php?trang=giohang"><i class="fas fa-shopping-bag"></i></a><span class="count_cart"><?php if(isset($_SESSION['cart'])){ echo $_SESSION['count_cart']; } ?></span></li>
                                <li class="R1-login dropdown" style="position:relative">
                                <?php
                                    if(isset($_SESSION['taikhoan_dk'])){
                                        echo "<span class='dropbtn'>";
                                        echo  $_SESSION['taikhoan_dk'];
                                        echo "<i class='fas fa-angle-right'></i></span>";
                                ?>
                                    <div class="dropdown-content">
                                        <a href="about_us.php?quanli_dx=dangxuat" class="dangxuat">Đăng xuất</a>
                                        <a href="pages/lichsu.php?ID_lichsu=<?php echo $_SESSION['id_khachhang'] ?>" class="dangxuat">Lịch sử</a>
                                    </div>
                                <?php
                                    }else{
                                ?>
                                    <a href="Login/login.php" style="display:block">Đăng nhập</a>
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
    
    <div class="container_lh">
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Hãy cho chúng tôi biết bạn đang nghĩ gì?</h3>
          <p class="text">
            
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>Số 1, Võ Văn Ngân, trường Sư phạm kĩ thuật, tp. Thủ Đức</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>h&t.fashion@gmail.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Kết nối với chúng tôi :</p>
            <ul class="social-icons">
              <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>   
            </ul>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="index.html" autocomplete="off">
            <h3 class="title">Phản hồi của khách hàng</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Tên</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Tài khoản  </label>
              <span>Tài khoản</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" />
              <label for="">Số điện thoại</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Nội dung góp ý</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" class="btn" />
          </form>
        </div>
      </div>
    </div>


    <?php
        include('pages/footer.php');
    ?>
</div>
</body>
</html>