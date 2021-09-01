<h4>Thêm sản phẩm</h4>
<table border="1px solid black"  class="table table-hover">
    <!-- Form thên sản phẩm -->
    <form action="quanlisanpham/xuli.php" method="POST" name="quanlisanpham" enctype="multipart/form-data">
        <!-- Muốn lấy file ảnh phải thêm script [enctype="multipart/form-data"] -->
        <tr class="form-group">
            <td><label for="tensp">Tên sản phẩm:</label></td>
            <td>
                <input class="form-control" type="text" name="tensp" id="tensp" required autocomplete="off">
            </td>
        </tr>     
        <tr class="form-group">
            <td><label for="giasp">Gía sản phẩm:</label></td>
            <td>
                <input type="number" name="giasp" id="giasp" class="form-control" required autocomplete="off">
            </td>            
        </tr>  
        <tr class="form-group">
            <td><label for="masp">Code:</label></td>
            <td>
                <input type="text" name="masp" id="masp" class="form-control" required autocomplete="off">
            </td>
        </tr>
        <tr class="form-group">
            <td><label for="anhsp">Ảnh sản phẩm:</label></td>
            <td>
                <input type="file" name="anhsp" id="anhsp" class="form-control-file border" required>
            </td>
        </tr>
        <tr class="form-group">
            <td>Màu</td>
            <td>
                <input type="text" name="mausp" id="mausp" class="form-control" required autocomplete="off">
            </td>
        </tr>
        <tr class="form-group">
            <td>Kích thước</td>
            <td>
                <input type="text" name="kichthuocsp" id="kichthuocsp" class="form-control" required autocomplete="off">
            </td>
        </tr>
        <tr class="form-group">
                <td><label for="sel1">Danh mục sản phẩm: </label></td>
                <td>
                    <select name="iddanhmuc" class="form-control" id="sel1">
                        <?php 
                            $sql_danhmuc = "SELECT * FROM categories ORDER BY ten ASC";
                            $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
                            while($rows= mysqli_fetch_array($query_danhmuc)){
                        ?>
                        <option value="<?php echo $rows['id_cate'] ?>"> <?php echo $rows['ten'] ?> </option>
                        <?php 
                            }
                        ?>
                    </select> 
                </td> 
        </tr>
        <tr class="form-group">
            <td>Mô tả sản phẩm</td>
            <td>
                <textarea name="motasp" id="" col="10" rows="5" plachehoder="Description detail about the product" id="motasp" class="form-control" required autocomplete="off"></textarea>
            </td>
        </tr>
        <tr style="text-align:right">
            <td colspan="2"><input type="submit" name="themsp" value="Add" class="btn btn-success btn-block" ></td>
        </tr>
    </form>
</table>

<!-- KIỂM TRA VALUE THÊM SẢN PHẨM -->
<!--
<script>
    function kiemtra(){
        var tensp=document.quanlisanpham.tensp.value;
        var giasp=document.quanlisanpham.giasp.value;
        var masp=document.quanlisanpham.masp.value;
        var anhsp=document.quanlisanpham.anhsp.value;
        var mausp=document.quanlisanpham.mausp.value;
        var kichthuocsp=document.quanlisanpham.kichthuocsp.value;
        var motasp=document.quanlisanpham.motasp.value;
        if(tensp ==''){
            alert('Please, enter product name');
            return false;
        }
        if(giasp ==''){
            alert('Please, enter product price');
            return false;
        }
        if(anhsp ==''){
            alert('Please, choice product picture');
            return false;
        }
        if(mausp ==''){
            alert('Please, enter product color');
            return false;
        }
        if(kichthuocsp ==''){
            alert('Please, enter product size');
            return false;
        }
        if(motasp =='' || motasp.length<=30){
            alert('Please, enter product detail description and least 30 letters ');
            return false;
        }
        
    }
</script>
-->