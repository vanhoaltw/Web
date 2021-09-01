<footer class="site-footer">
      <div class="container_footer">
        <div class="row_footer">
          <div class="col-sm-12 col-md-6">
            <h6>H&T fashion có gì?</h6>
            <p class="text-justify">H&T fashion trang web mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! H&T  
            là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á, Việt Nam, Singapore, Malaysia, Indonesia, Thái Lan, 
            Philipin, Đài loan và Brazil. Với sự đảm bảo của H&T, bạn sẽ mua hàng trực tuyến an tâm và nhanh chóng 
            hơn bao giờ hết!</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Danh mục sản phẩm</h6>
            <ul class="footer-links">
                <?php 
                    $danhmuc= "SELECT * FROM categories ORDER BY ten ASC";
                    $lietke= mysqli_query($mysqli,$danhmuc); 
                    while($row = mysqli_fetch_array($lietke)){
                ?>
                    <li><a href="index.php?quanli=danhmucsanpham&ID=<?php echo $row['id_cate'] ?>"><?php echo $row['ten']?></a></li>
                <?php
                    }
                ?>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Liên kết</h6>
            <ul class="footer-links">
              <li><a href="index.php">Cửa hàng</a></li>
              <li><a href="lienhe.php">Liên hệ</a></li>
              <li><a href="about_us.php">Giới thiệu</a></li>
              <li><a href="pages/cart.php">Giỏ hàng</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container_footer">
        <div class="row_footer">
          <div class="">
            <p class="copyright-text">Copyright &copy; được cấp phép bản quyền vào năm 2021 
            <a href="#">H&T fashion</a>.
            </p>
          </div>

          <div class="">
            <ul class="social-icons">
              <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>