<?php 
    $main_sp= "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[ID]' ORDER BY name ASC";
    $main_query= mysqli_query($mysqli,$main_sp);
    $main_sp_cate= "SELECT * FROM categories WHERE categories.id_cate='$_GET[ID]' ORDER BY id_cate ASC";
    $main_sp_cate_query= mysqli_query($mysqli, $main_sp_cate);
    $main_row_title=mysqli_fetch_array($main_sp_cate_query);
?>
<h1>Danh mục: <?php echo $main_row_title['ten'] ?></h1>
<div class="wrap_sp">
    <?php 
        while($main_row=mysqli_fetch_array($main_query)){
    ?>
        <div class="product_sp" >
            <div class="product-header_sp">
                <img src="IMAGE_PRODUCT/<?php echo $main_row['image'] ?>" alt="Dedsadnim Jeans">
                <ul class="icons_sp">
                    <span><a href="pages/giohang.php?id_yeuthich=<?php echo $main_row['id'] ?>"><i class="fas fa-heart"></i></a></span>
                    <span><a href="pages/giohang.php?id_sanpham=<?php echo $main_row['id'] ?>"><i class="fas fa-shopping-basket"></i></a></span>
                    <span><a href="index.php?quanli=chitietsp&id=<?php echo $main_row['id'] ?>"><i class="fas fa-info-circle"></i></a></span>
                </ul>
            </div>
            <div class="product-footer_sp">
                <a href="#"><h3><?php echo $main_row['name'] ?></h3></a>
                    <div class="rating_sp">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                <h4 class="price_sp"><u style="text-decoration:underline;">đ</u><?php echo $main_row['price'] ?></h4>
            </div>
        </div>
    <?php
        }
    ?>   
</div>