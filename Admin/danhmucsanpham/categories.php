<?php
    $danhmuc= "SELECT * FROM categories ORDER BY ten ASC";
    $lietke= mysqli_query($mysqli,$danhmuc);
?>
<h1>Danh mục sản phẩm</h1>
<table border="1" width="900px" class="table table-striped">
    <!-- Tiêu đề danh mục sản phẩm -->
    <tr>
        <th>Số thứ tự</th>
        <th>Tên danh mục</th>
        <th>Lựa chọn</th>
    </tr>
    <?php
        $index=0;
        while ($row = mysqli_fetch_array($lietke)){
        $index++;    
    ?>
    <!-- Danh mục sản phẩm -->
        <tr>
            <td><?php echo($index)?></td>  
            <td><?php echo($row['ten']) ?></td>    
            <td><a href="danhmucsanpham/xuli.php?ID=<?php echo($row['id_cate']) ?>" class="btn btn-outline-success btn-sm">Xóa</a> - 
                <a class="btn btn-outline-success btn-sm btn_sua">Sửa</a></td>  
        </tr>
        <tr class="form_sua_dm" >
            <td colspan="3">
                    <table>
                        <form action="danhmucsanpham/EDIT.php?ID=<?php echo $row['id_cate'] ?>" method="POST">
                                <tr>
                                    <td>Danh mục: <input type="text" plachehoder="Edit...." name="suaten" value="<?php echo($row['ten']) ?>"></td>
                                    <td><input type="submit" value="Đổi tên danh mục: " name="suadanhmuc"></td>
                                </tr>
                        </form>
                    </table>            
            </td>
        </tr>
    <?php
        }    
    ?>
        
</table>

<script>
    alert("chạy js");
    var btn_sua=document.getElementsByClassName("btn_sua");
    var danhmuc=document.getElementsByClassName("form_sua_dm");

    for(var i=0; i<btn_sua.length; i++){
            btn_sua[i].addEventListener("click", function(){
                    if(danhmuc[i].style.display === "none"){
                        danhmuc[i].style.dislay = "block";
                    }else{
                        danhmuc[i].style.dislay = "none";
                    }
                })
            /*btn_sua[i].addEventListener("click", function(){
                danhmuc.innerHTML="HẾ LÔ";
                for(var j=0; j<danhmuc.length; j++){
                    if(danhmuc[j].style.display == "block"){
                        danhmuc[j].style.display == "none";
                    }else{
                        danhmuc[j].style.display == "block";
                    }
                }*/
    }
    
</script>