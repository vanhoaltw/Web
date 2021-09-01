<?php 
    include('../config/config.php');
    session_start();
    if(isset($_POST['new_cmt'])){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time=date('H:m:s - d/m/y',time());
        $id_sp_cmt=$_GET['id'];
        $content_cmt=$_POST['content_cmt'];
        $taikhoan_cmt=$_SESSION['taikhoan_dk'];
        $sql_cmt="INSERT INTO comment(id_kh_cmt,id_sp_cmt,content_cmt,date_cmt) VALUE('".$taikhoan_cmt."','".$id_sp_cmt."',
        '".$content_cmt."', '".$time."')";
        $query_cmt=mysqli_query($mysqli,$sql_cmt);
        header('Location:../index.php');
      }

?>