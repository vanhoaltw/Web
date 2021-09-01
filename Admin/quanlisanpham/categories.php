<?php
    $danhmuc_SP= "SELECT * FROM sanpham,categories WHERE sanpham.id_danhmuc=categories.id_cate ORDER BY name ASC";
    $lietke_SP= mysqli_query($mysqli,$danhmuc_SP);
?>
<h1>Danh sách sản phẩm</h1>
<div style="min-height:220px;max-height:900px; overflow:auto; position:relative;">
<table border="1" width="900px" class="table table-bordered table-hover" style="position:relative">
    <!-- Tiêu đề sản phẩm -->
    <tr style="position:sticky; top:0; background:white">
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Code</th>
        <th>Ảnh</th>
        <th>Màu</th>
        <th>Kích thước</th>
        <th>Danh mục</th>
        <th style="width:30%">Mô tả sản phẩm</th>
        <th>Tùy chọn</th>
    </tr>
    <?php
        $index=0;
        while ($row = mysqli_fetch_array($lietke_SP)){
        $index++;    
    ?>
        <!-- Danh sách sản phẩm --> 
        <tr >
            <td><?php echo($index)?></td>  
            <td><?php echo($row['name']) ?></td>
            <td><?php echo($row['price']) ?></td>
            <td><?php echo($row['code']) ?></td>
            <td><img src="../IMAGE_PRODUCT/<?php echo($row['image'])?>" alt="Can't load img" width="100px" height="100px"></td>
            <td><?php echo($row['color']) ?></td>
            <td><?php echo($row['size']) ?></td>
            <td><?php echo($row['ten'])?></td>
            <td><?php echo($row['description']) ?></td>    
        <!-- nút sửa / xóa -->
            <td style="text-align:center;">
                <a href="quanlisanpham/xuli.php?ID=<?php echo($row['id']) ?>" style="text-decoration:none; margin-bottom:10px;" class="btn btn-outline-success btn-sm">Delete</a> 
                <a href="quanlisanpham/sua.php?ID=<?php echo($row['id']) ?>" style="text-decoration:none;"  class="btn btn-outline-success btn-sm">Edit</a>
            </td>  
        </tr>
    <?php
        }    
    ?>
        
</table>
</div>