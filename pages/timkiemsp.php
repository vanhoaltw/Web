<?php
    $tukhoa = $_GET['noidung_timkiem'];
    $sql_timkiem="SELECT * FROM sanpham WHERE name LIKE '%'.$tukhoa.'%'";
    $query_timkiem= mysqli_query($mysqli,$sql_timkiem);

?>
<h1>TIM KIEM SP</h1>

    <?php 
        while($row_timkiem=mysqli_fetch_array($query_timkiem)){
    ?>
        <a href="index.php?quanli=chitietsp&id=<?php echo $row_timkiem['id'] ?>">
            <div class="card">
                <img src="IMAGE_PRODUCT/<?php echo $row_timkiem['image'] ?>" alt="Dedsadnim Jeans" style="width:100%; height:300px;">
                <h1><?php echo $row_timkiem['name'] ?></h1>
                <p class="price">$ <?php echo $row_timkiem['price'] ?></p>
                <p class="description"><?php echo $row_timkiem['description'] ?></p>
                <p><button>Add to Cart</button></p>
            </div>
    <?php
        }
                                    
    ?>
                            </div>
                        </a>