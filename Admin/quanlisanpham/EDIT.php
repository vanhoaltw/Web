<?php
    include("../../config/config.php");
    $tenmoi_SP=$_POST['suaten_SP'];
    $giamoi_SP=$_POST['suagia_SP'];
    $mamoi_SP=$_POST['suama_SP'];
    //ảnh
    $anhmoi=$_FILES['suaanh_SP']['name'];
    $anhmoi_SP=$_FILES['suaanh_SP']['tmp_name'];
    $anhmoi = time().'-'.$anhmoi;
    //
    $maumoi_SP=$_POST['suamau_SP'];
    $kichthuocmoi_SP=$_POST['suakichthuoc_SP'];
    $danhmuc_SP=$_POST['suadanhmuc_SP'];
    $motamoi_SP=$_POST['suamota_SP'];


    if(isset ($_POST['suasanpham'])){
        if($anhmoi==null){ 
            $sql_pdate_SP="UPDATE sanpham SET 
                name ='".$tenmoi_SP."',
                price ='".$giamoi_SP."',
                code ='".$mamoi_SP."',
                color ='".$maumoi_SP."',
                size ='".$kichthuocmoi_SP."',
                id_danhmuc= '".$danhmuc_SP."',
                description ='".$motamoi_SP."'        
            WHERE id='$_GET[ID]'";                          
        }else{
            move_uploaded_file($anhmoi_SP,'../../IMAGE_PRODUCT/'.$anhmoi);
            $sql_SP = "SELECT * FROM sanpham WHERE id ='$_GET[ID]' LIMIT 1";
            $query_SP = mysqli_query($mysqli, $sql_SP);
            while($row_SP = mysqli_fetch_array($query_SP)){
                unlink('../../IMAGE_PRODUCT/'.$row_SP['image']);
            }
            $sql_Update_SP="UPDATE sanpham SET 
                name ='".$tenmoi_SP."',
                price ='".$giamoi_SP."',
                code ='".$mamoi_SP."',
                image ='".$anhmoi."',
                color ='".$maumoi_SP."',
                size ='".$kichthuocmoi_SP."',
                id_danhmuc= '".$danhmuc_SP."',
                description ='".$motamoi_SP."'        
            WHERE id='$_GET[ID]'";  
        }
        mysqli_query($mysqli,$sql_Update_SP);
        header('Location:../index.php');
    }
?>