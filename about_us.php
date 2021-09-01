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
    <style>
TD
{
padding:20PX;
}
H3
{ text-align:center;
} 
#profile p
{ text-align:center;
font-family:"Arial Black", Gadget, sans-serif;
}
body{
  background:#81c644 ;
  font-family: 'Josefin Sans', sans-serif;
}

.wrapper{
  
}

.wrapper h1{
  font-family: 'Allura', cursive;
  font-size: 52px;
  margin-bottom: 60px;
  text-align: center;
  margin-top:10px;
}

.team{
  display: flex;
  justify-content: center;
  width: auto;
  text-align: center;
  flex-wrap: wrap;
}

.team .team_member{
  background: #fff;
  margin: 5px;
  margin-bottom: 50px;
  width: 500px;
  padding: 20px;
  line-height: 20px;
  color: #8e8b8b;  
  position: relative;
}

.team .team_member h3{
  color: #81c644;
  font-size: 26px;
  margin-top: 50px;
}

.team .team_member p.role{
  color: #ccc;
  margin: 12px 0;
  font-size: 12px;
  text-transform: uppercase;
}

.team .team_member .team_img{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #fff;
}

.team .team_member .team_img img{
  width: 100px;
  height: 100px;
}
#H3{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 27px;
  color: #473a3a;
}
#content{
  text-align: center;
  font-size: 20px;
  color: #4c4c4c;
}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H&T fashion</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura|Josefin+Sans" rel="stylesheet">
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
                            <li class="R1-home"><a href="lienhe.php">Liên hệ</a></li>
                            <li class="R1-about" style="box-sizing:border-box; background:red"><a href="about_us.php?trang=aboutus" style="color:white">Giới thiệu</a></li>
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
<!-------------Main_about_us------------------>
<div class="warpper" style="margin-top: 20px; background:#81c644 ;">
<section style="min-height:150px">
  <br>
  <br>
<h1 style="
color:rgb(255, 255, 255);
text-align: center;
font-size: 30px;"
>THƯƠNG HIỆU CHÚNG TÔI LÀ</h1><br><br>
<p style="
color:rgb(255, 255, 255);
font-size: 25px;
text-align: center;
margin-left: 100px;
margin-right: 100px;">
H&T Fashion là một bước tiến mới trong lĩnh vực thời trang đơn giản, cùng với đội ngũ các nhà thiết kế hàng đầu, chúng tôi sáng tạo nên những trang phục và những bộ sưu tập dành riêng cho mùa lễ hội.
Với chúng tôi, thời trang được định nghĩa là "đam mê và nhiệt huyết". Thời trang là một sự sáng tạo vô tận cùng với những ý tưởng mang tính đột phá
</p>
<br><br>
</div>
</div>
<br>
<div style="width:100%;height:270px; background-color:RGBA(245,246,246,0.7)">
<table>
<tr>
<td>
<br>
<h3 id="H3"><b>CHÚNG TÔI LÀ AI?</b></h3>
<br>
<p id="content">Chúng tôi là thương hiệu dẫn hiệu dẫn đầu trong phong cách thời trang đơn giản và mang đậm nét hiện đại của lối sống nhộn nhịp ngày nay. Theo chúng tôi, thời trang là "đam mê và nhiệt huyết"</p>
<td>
<br>
<h3 id="H3"><b>CHÚNG TÔI SẼ LÀM GÌ?</b></h3>
<br>
<p id="content">Chúng tôi bao gồm những nhà thiết kế thời trang hàng đầu sẽ làm nên nhưng trang phục, bộ sưu tập dành riêng cho chính bạn và đó là cách chúng tôi định nghĩa thời trang</p>
</td>
<td>
<br>
<h3 id="H3"><b>GIÁ TRỊ CỦA CHÚNG TÔI?</b></h3>
<br>
<p id="content">Bạn sẽ không khỏi bất ngờ vì sự đơn giản và tinh tế từ trang phục chúng tôi. Giá trị chúng tôi mang đến chính là niềm kiêu hãnh của bạn khi khoác lên mình những trang phục của chúng tôi</p>
 </td>
</tr>
</table>
</div>
<div class="wrapper">
  <h1 style="color: rgb(255, 255, 255) "  >Our Team</h1>
  <div class="team">
    <div class="team_member">
      <div class="team_img">
        <img src="IMAGE_PRODUCT/tin1.png" alt="Team_image">
      </div>
      <h3>TÍN NGÔ</h3>
      <p class="role">Co-founder/ UI-UX design</p>
      <p>Tốt nghiệp trường Đại học Văn lang với chuyên ngành Thiết kế đồ họa. Tôi đã có 3 năm kinh nghiệm trong lĩnh vực UI/UX design.
        Với tôi, thương hiệu H&T Fashion là một bước tiến mới đầy thách thức và nhiều tham vọng của tôi trong tương lai.
      </p>
    </div>
    <div class="team_member">
      <div class="team_img">
        <img src="IMAGE_PRODUCT/hoa1.png" alt="Team_image">
      </div>
      <h3>HÒA NGUYỄN</h3>
      <p class="role">Co-founder/ full-stack developer </p>
      <p>Tốt nghiệp trường Đại học Bách Khoa TP.HCM với chuyên ngành Khoa học máy tính.
          Tôi đã từng đầu quân cho một số công ty phần mềm lớn tại Việt nam ở 2 năm đầu.
          Nhưng tinh thần khởi nghiệp luôn bừng cháy trong tim tôi.
          Và đó chính là cột mốc cho sự ra đời của thương hiệu H&T Fashion</i>
      </p></div>
    </div>
  </div>
</div>




<!-------------------X-------------------------->
<?php
    include('pages/footer.php');
?>
</div>
</body>
</html>