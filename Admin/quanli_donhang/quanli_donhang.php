<?php
    $sql_cart="SELECT * FROM donhang_kh, ds_dangki WHERE donhang_kh.ten_kh=ds_dangki.id_dk ";
    $query_cart=mysqli_query($mysqli, $sql_cart);
?>

<table class="table table-bordered table-hover">
    <tr>
        <th>Tên khách hàng</th>
        <th width="5%">Đơn hàng</th>
        <th>Số điện thoại</th>
        <th width=25%>Địa chỉ</th>
        <th width="40%;">Chi tiết đơn hàng</th>
        <th>Tình trạng</th>
    </tr>
    <?php 
        while($row_cart=mysqli_fetch_array($query_cart)){
    ?>
    <tr>
        <td> <?php echo $row_cart['ten_user'] ?></td>
        <td> <?php echo $row_cart['code_donhang']?></td>
        <td> <?php echo $row_cart['phone_dk']?></td>
        <td> <?php echo $row_cart['address_dk']?></td>
        <td style="position:relative;" ><button class="hien_chitiet btn btn-outline-success">Chi tiet</button>
        <!---------Chi tiet san pham-------->
            <div class="chitiet_sp" style=" height:0" >
                <div colspan="5">
                <?php 
                    $sql_code="SELECT * FROM quanli_donhang,sanpham WHERE quanli_donhang.code_donhang='".$row_cart['code_donhang']."' AND sanpham.id=quanli_donhang.id_sanpham ORDER BY quanli_donhang.id_cart DESC ";
                    $query_code= mysqli_query($mysqli,$sql_code);
                    $tongtien=0;
                ?>
                    <table border="1">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                <?php 
                    while($row_sanpham=mysqli_fetch_array($query_code)){
                        $thanhtien=$row_sanpham['price']*$row_sanpham['soluong'];
                        $tongtien +=$thanhtien;
                ?>    
                        <tr>
                            <td> <?php echo $row_sanpham['name'] ?></td>
                            <td> <img src="../IMAGE_PRODUCT/<?php echo $row_sanpham['image'] ?>" alt="" width="100px" height="100px"></td>
                            <td> <?php echo $row_sanpham['price'] ?></td>
                            <td> <?php echo $row_sanpham['soluong'] ?></td>
                            <td> <?php echo $thanhtien ?></td>
                        </tr>
                <?php
                    }
                ?>
                        <tr>
                            <td colspan="5">Tổng tiền: <?php echo $tongtien ?></td>
                        </tr>
                    </table>
                </div>    
            </div>


        <!---------x-------->
        </td> 
        <td><a href="quanli_donhang/xuli_giaohang.php?donhang1=dagiao&code_donhang=<?php echo $row_cart['code_donhang']?>" class="btn btn-outline-success">Đã giao hàng</a></td>
    </tr>
    <?php
        }
    ?>
</table>
<div>
</div>

<script>
    var hien_chitiet=document.getElementsByClassName("hien_chitiet");
    var i;
    for(i=0; i<hien_chitiet.length; i++){
        hien_chitiet[i].addEventListener("click", function (){
            this.classList.toggle("active");
            var chitiet=this.nextElementSibling;
            if(chitiet.style.height =="0px"){
                chitiet.style.height = "300px";
            }else{
                chitiet.style.height = "0px";
            }
        });
    }
</script>