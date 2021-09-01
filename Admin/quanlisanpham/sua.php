<?php
    include('../../config/config.php'); 
    $danhmucmoi_SP= "SELECT * FROM sanpham WHERE id='$_GET[ID]' LIMIT 1";
    $lietkemoi_SP= mysqli_query($mysqli,$danhmucmoi_SP);
?>
<h4>Chỉnh sửa sản phẩm</h4>
<table>
    <form action="EDIT.php?ID=<?php echo $_GET['ID'] ?>" name="themsp" method="POST" enctype="multipart/form-data">
        <?php 
            while($dong=mysqli_fetch_array($lietkemoi_SP)){
        ?>
        <!-- Form sửa sản phẩm -->
        <tr>
            <td>Name: <input type="text" plachehoder="Edit...." name="suaten_SP" value="<?php echo($dong['name']) ?>"></td>
            <td>Price: <input type="text" plachehoder="Edit...." name="suagia_SP" value="<?php echo($dong['price']) ?>"></td>
            <td>Code: <input type="text" plachehoder="Edit...." name="suama_SP" value="<?php echo($dong['code']) ?>"></td>
            <td>Image: <?php echo($dong['image']) ?> <img src="../../IMAGE_PRODUCT/<?php echo $dong['image'] ?>" alt="" width="100px" height="100px"> <input type="file" name="suaanh_SP"></td>
            <td>Color: <input type="text" plachehoder="Edit...." name="suamau_SP" value="<?php echo($dong['color']) ?>"></td>
            <td>Size: <input type="text" plachehoder="Edit...." name="suakichthuoc_SP" value="<?php echo($dong['size']) ?>"></td>
            <td>Description:
                <textarea name="suamota_SP" id="" cols="30" rows="10"><?php echo($dong['description']) ?></textarea>
            </td>
            <td>Danh mục sản phẩm:
                <select name="suadanhmuc_SP" id="">
                    <?php 
                        $sql_danhmuc = "SELECT * FROM categories ORDER BY ten ASC";
                        $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
                        while($rows= mysqli_fetch_array($query_danhmuc)){
                        if($rows['id_cate']==$dong['id_danhmuc']){
                    ?>
                    <option selected value="<?php echo $dong['id_danhmuc'] ?>"> <?php echo $rows['ten'] ?> </option>
                    <?php 
                        }else{
                    ?>
                    <option value="<?php echo $dong['id_danhmuc'] ?>"> <?php echo $rows['ten'] ?> </option>
                    <?php    
                        }
                    }
                    ?>
                </select> 
            
            </td>
            <td><input type="submit" value="Edit" name="suasanpham"></td>
        </tr>
        <!-- ------------------------------ -->
        <?php
            }
        ?>
    </form>
    </table>
   
   