<?php
    session_start();
    include('config/config.php');
	if(isset($_GET['quanli_dx'])=='dangxuat'){
        unset($_SESSION['taikhoan_dk']);
        header('Location:index.php');
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
       #ul_search{
           display:none;
       }
    </style>
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
        <!--------------------------------------Navbar---------------------------------------------- -->
        <div class="R1-container">
            <div class="R1-top">
                <table class="R1-top">
                <tr width="900px">
                    <td width="500px">
                        <h1 title="Trang chủ"><a href="index.php"><b >H&T </b>fashion</a></h1>      
                    </td>
                    <td width="500px">
                        <ul class="R1-top-menu">                            
                            <li class="R1-home" style="box-sizing:border-box; background:red; color:white" title="Cửa hàng"><a href="index.php" style="color:white">Cửa hàng</a></li>
                            <li class="R1-home" title="Liên hệ"><a href="lienhe.php">Liên hệ</a></li>
                            <li class="R1-about" title="Giới thiệu"><a href="about_us.php?trang=aboutus">Giới thiệu</a></li>
                            <li class="R1-cart" title="Giỏ hàng"><a href="pages/cart.php?trang=giohang"><i class="fas fa-shopping-bag"></i></a><span class="count_cart"><?php if(isset($_SESSION['cart'])){ echo $_SESSION['count_cart']; } ?></span></li>
                            <li class="R1-login dropdown" style="position:relative">
                                <!-----------------------Check session-------------------------->
                                <?php
                                    if(isset($_SESSION['taikhoan_dk'])){
                                        echo "<span class='dropbtn'>";
                                        echo  $_SESSION['taikhoan_dk'];
                                        echo "<i class='fas fa-angle-right'></i></span>";
                                ?>
                                    <div class="dropdown-content">
                                        <a href="index.php?quanli_dx=dangxuat" class="dangxuat">Đăng xuất</a>                                    
                                        <a href="pages/lichsu.php?ID_lichsu=<?php echo $_SESSION['id_khachhang'] ?>" class="dangxuat">Lịch sử</a>
                                    </div>
                                <?php
                                    }else{
                                ?>
								    <a href="Login/login.php" style="display:block">Đăng nhập</a>
                                <?php
                                    }
                                ?>
                                <!-----------------------------X--------------------------------->
                            </li>
                        </ul>
                    </td>
                </tr>
                </table>
            </div>
        </div>

            <!-----------------------Tim kiem san pham---------------------------->
            <div class="search_container">
                <input title="Tìm kiếm sản phẩm" autocomplete="off" type="text" id="search_input" placeholder="Tìm kiếm sản phẩm ...." onkeyup="timkiem()" name="noidung_timkiem">
                <div id="search_list_container">
                    <ul id="search_ul">
                        <?php
                            $main_sp_1= "SELECT * FROM sanpham ORDER BY name DESC ";
                            $main_query_1= mysqli_query($mysqli,$main_sp_1);
                            while($main_row_1=mysqli_fetch_array($main_query_1)){
                        ?>
                            <li>
                                <img src="IMAGE_PRODUCT/<?php echo $main_row_1['image'] ?>" alt="Dedsadnim Jeans" style="width:50px; height:50px;">
                                <a href="index.php?quanli=chitietsp&id=<?php echo $main_row_1['id'] ?>"><?php echo $main_row_1['name'] ?></a>
                                <label class="search_price"><u style="text-decoration:underline;">đ</u><?php echo $main_row_1['price'] ?></label>  
                            </li>
                            
                        <?php
                            }
                        ?>
                    </ul>
                </div>      
            </div>
        <!-- ---------------------------------X------------------------------->
        <center>
            
                <div class="container_sp">
                    <div class="container_sp_left">
                        <div class="sp_cate">
                            <h1>Danh mục</h1>
                            <ul>            
                                <?php
                                $danhmuc= "SELECT * FROM categories ORDER BY ten ASC";
                                $lietke= mysqli_query($mysqli,$danhmuc);      
                                while($row = mysqli_fetch_array($lietke)){    
                                ?>
                                    <li style="display:block;"> 
                                        <a href="index.php?quanli=danhmucsanpham&ID=<?php echo $row['id_cate'] ?>"><?php echo $row['ten']; ?></a>
                                    </li>
                                <?php 
                                }
                                ?>
                            </ul> 
                        </div>                      
                    </div>
                    <!--------------------------------Sản phẩm chính-------------------- --------------->        
                    <div class="container_sp_right">
                        <?php
                            if(isset($_GET['ID'])){
                                /*-----Lấy toàn bộ sản phẩm-----*/
                                include('pages/main_sanpham.php');
                            }elseif(isset($_GET['quanli'])=='chitietsp'){
                                /*-----Xem chi tiết sp----------*/ 
                                include('pages/chitietsp.php');                                
                            }elseif(isset($_GET['timkiem'])){
                                /*-------Tìm kiếm sp------------*/
                                include("pages/timkiemsp.php");   
                            }else{
                                /*-----Chọn sản phẩm theo danh mục--------*/
                                $main_sp_1= "SELECT * FROM sanpham ORDER BY id ASC LIMIT 10";
                                $main_query_1= mysqli_query($mysqli,$main_sp_1);
                        ?>
                        <div class="wrap_sp">
                            <?php 
                                while($main_row_1=mysqli_fetch_array($main_query_1)){
                            ?>
                                
                                    <div class="product_sp" >
                                        <div class="product-header_sp">
                                            <img src="IMAGE_PRODUCT/<?php echo $main_row_1['image'] ?>" alt="Dedsadnim Jeans">
                                            <ul class="icons_sp">
                                                <span><a href="pages/giohang.php?id_yeuthich=<?php echo $main_row_1['id'] ?>"><i class="fas fa-heart"></i></a></span>
                                                <span><a href="pages/giohang.php?id_sanpham=<?php echo $main_row_1['id'] ?>"><i class="fas fa-shopping-basket"></i></a></span>
                                                <span><a href="index.php?quanli=chitietsp&id=<?php echo $main_row_1['id'] ?>"><i class="fas fa-info-circle"></i></a></span>
                                            </ul>
                                        </div>
                                        <div class="product-footer_sp">
                                            <a href="#"><h3><?php echo $main_row_1['name'] ?></h3></a>
                                            <div class="rating_sp">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            </div>
                                            <h4 class="price_sp"><u style="text-decoration:underline;">đ</u><?php echo $main_row_1['price'] ?></h4>
                                        </div>
                                    </div>
                                
                                <!-----------Card san pham----------->
                                

                                <!---------------------------------------->
                            <?php
                                }
                            }    
                            ?>
                        </div>                        
                    </div>
                    <!------------------------------------------X------------------------------>
                </div>
        </center>

        <div>
            <?php include('pages/footer.php'); ?>
        </div>
    </div>
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script>
      var input = document.getElementById("search_input");
      function timkiem(){
          var filter, ul, li, a, i;
          filter = input.value.toUpperCase();
          ul = document.getElementById("search_ul");
          li = ul.getElementsByTagName("li");
          if (!filter) {
            ul.style.display = "none";
          }else{
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    ul.style.display = "block";
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
          }
      }
      
    </script>
</html>