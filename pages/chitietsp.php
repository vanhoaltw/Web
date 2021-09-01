<?php
    $main_spchitiet= "SELECT * FROM sanpham WHERE sanpham.id='$_GET[id]' LIMIT 1";
    $main_querychitiet= mysqli_query($mysqli,$main_spchitiet);
    $comment_chitiet="SELECT * FROM comment WHERE id_sp_cmt='$_GET[id]' ORDER BY id_cmt DESC";
    $comment_query=mysqli_query($mysqli,$comment_chitiet);
    /*-----------Comment---------*/
    while($row_chitiet = mysqli_fetch_array($main_querychitiet)){
    
?>

<div class = "card-wrapper_detail">
      <div class = "card_detail">
        <!-- card left -->
        <div class = "product-imgs_detail">
          <div class = "img-display_detail">
            <div class = "img-showcase_detail">
              <img src="IMAGE_PRODUCT/<?php echo $row_chitiet['image'] ?>" width="500px" height="500px">
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content_detail">
          <h2 class = "product-title_detail"><?php echo $row_chitiet['name'] ?></h2>
          <div class = "product-rating_detail">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

          <div class = "product-price_detail">
            <p style="font-size:20px">Giá: <span class = "last-price_detail"><u style="text-decoration:underline;">đ</u>257.00</span> <span class = "new-price_detail"><u style="text-decoration:underline;">đ</u><?php echo $row_chitiet['price'] ?></span></p>
          </div>

          <div class = "product-detail_detail">
            <h2 style="font-size:25px">Chi tiết sản phẩm: </h2>
            <p class="product-detail-des_detail"><?php echo $row_chitiet['description'] ?></p>
            <ul>
              <li><i class="fas fa-check-circle" style="color:green;"></i> Màu: <span><?php echo $row_chitiet['color'] ?></span></li>
              <li><i class="fas fa-check-circle" style="color:green;"></i> Kích cỡ: <span><?php echo $row_chitiet['size'] ?></span></li>
              <li><i class="fas fa-check-circle" style="color:green;"></i> Tình trạng: <span>còn hàng</span></li>
            </ul>
          </div>
            <form action="pages/giohang.php?quanli=giohang&idsanpham=<?php echo $row_chitiet['id'] ?>" method="POST">
                <input class="btn_detail" type="submit" value="Thêm vào giỏ hàng" name="themgiohang">
            </form>     
          </div>
        </div>
      </div>

      <!------Comment----->
      <div class="container_cmt">
          <h1>Bình luận</h1>
          <div>
            <form action="pages/comment.php?id=<?php echo $_GET['id'] ?>" class="form_cmt" method="POST">
              <input type="text" name="content_cmt" placeholder="Nhập bình luận..." class="input_cmt" required>
              <?php
                if(isset($_SESSION['taikhoan_dk'])){
              ?>
              <button type="submit" name="new_cmt" class="btn_cmt">Gửi</button>
              <?php 
                }else{
              ?>
              <a href="Login/login.php">Vui lòng đăng nhập để bình luận</a>
              <?php
                }
              ?>
            </form>
          </div>
          <div class="wrap_cmt">
            <?php
                while($rows_cmt=mysqli_fetch_array($comment_query)){
            ?>
              <div class="row_cmt">
                <div><b><?php echo $rows_cmt['id_kh_cmt'] ?></b> <span>Thời gian bình luận: <?php echo $rows_cmt['date_cmt'] ?></span></div>
                <div><?php echo $rows_cmt['content_cmt'] ?></div>
              </div>
            <?php
                }
            ?>
          </div>
      </div>
</div>     
<?php } ?>     

