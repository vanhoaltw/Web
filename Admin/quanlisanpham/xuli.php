<?php
    include('../../config/config.php'); 
    $tenSP= $_POST['tensp'];
    $giaSP=$_POST['giasp'];
    $maSP= $_POST['masp'];
    $mauSP= $_POST['mausp'];
    $kichthuocSP=$_POST['kichthuocsp'];
    $id_danhmuc=$_POST['iddanhmuc'];
    $motaSP=$_POST['motasp'];
    // Xử lí hình ảnh
    // Cú pháp: $_FILES['name của trường ghi']['tmp_name'];
    $anh=$_FILES['anhsp']['name'];
    $anhSP=$_FILES['anhsp']['tmp_name'];
    $anh= time().'-'.$anh;
    //upload ảnh vào file 'IMAGE_PRODUCT'

    
    if(isset($_POST['themsp'])){
        //------------------Tạo sản phẩm mới----------------------------//
        $sql_them = "INSERT INTO sanpham(name, price, code, image, color, size,id_danhmuc,description) 
            VALUE('".$tenSP."','".$giaSP."', '".$maSP."','".$anh."', '".$mauSP."','".$kichthuocSP."', '".$id_danhmuc."' ,'".$motaSP."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($anhSP,'../../IMAGE_PRODUCT/'.$anh);
        header('Location:../index.php');
    }else{
        //-----------------Xóa sản phẩm được chọn----------------------//
        $id=$_GET['ID'];
        //Xóa ảnh gắn với sản phẩm trong muc IMGAE_PRODUCT//
        $sql = "SELECT * FROM sanpham WHERE id ='$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('../../IMAGE_PRODUCT/'.$row['image']);
        };
        //--------------X---------------//
        $xoa = "DELETE FROM sanpham WHERE id='".$id."'";
        mysqli_query($mysqli, $xoa);
        header('Location:../index.php');    
    }
?>