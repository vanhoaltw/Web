<?php
    session_start();
    include('../config/config.php');
    /*--------------------------------------------Gửi yêu cầu đăng nhập------------------------------------------ */
    if(isset($_POST['dangnhap'])){
        $user= $_POST['user'];
        $password = $_POST['password'];
        $taikhoan_dk="SELECT * FROM ds_dangki WHERE user_dk='".$user."' AND password_dk  ='".$password."' LIMIT 1";
        $taikhoan   ="SELECT * FROM admin_acc   WHERE user   ='".$user."' AND password='".$password."' LIMIT 1";
        $sql =   mysqli_query($mysqli, $taikhoan);
        $sql_dk= mysqli_query($mysqli, $taikhoan_dk);
        $sql_dk_row=mysqli_fetch_array($sql_dk);
        $row_ad= mysqli_num_rows($sql);
        $row_dk= mysqli_num_rows($sql_dk);                       
        if($row_ad > 0){
            $_SESSION['taikhoan_admin']=$user;
            header("Location:../Admin/index.php");
        }elseif( $row_dk > 0){
            $_SESSION['taikhoan_dk']=$sql_dk_row['ten_user'];
            $_SESSION['id_khachhang']=$sql_dk_row['id_dk'];
            header("Location:../pages/cart.php");
        }else{
            echo ('<p style="color:red;">Bạn đã đăng nhập sai tên đăng nhập hoặc mật khẩu. Vui lòng thử lại</p>');
        }
    }
    /*-------------------------------------------Gửi yêu cầu đăng kí ---------------------------------------------*/
    if(isset($_POST['dangki'])){
        $name_user=$_POST['name_user'];
        $user_dk=$_POST['user_dk'];
        $psw_dk=$_POST['psw_dk'];
        $phone_dk=$_POST['phone_dk'];
        $address_dk=$_POST['address_dk'];
        $sql_danhsach_ad= "SELECT * FROM admin_acc WHERE user='".$user_dk."' LIMIT 1";
        $sql_danhsach_dk= "SELECT * FROM ds_dangki WHERE user_dk='".$user_dk."' LIMIT 1";
        $query_ds_ad=mysqli_query($mysqli,$sql_danhsach_ad);
        $query_ds_dangki=mysqli_query($mysqli,$sql_danhsach_dk);
        $count_ad=mysqli_num_rows($query_ds_ad);
        $count_dk=mysqli_num_rows($query_ds_dangki);
        if($count_dk>0 || $count_ad>0){
            echo ('Tai khoan da duoc dang ki');
        }else{  
                $sql="INSERT INTO ds_dangki(ten_user,user_dk,password_dk, phone_dk, address_dk) VALUE ('".$name_user."','".$user_dk."', '".$psw_dk."', '".$phone_dk."','".$address_dk."')";
                $query= mysqli_query($mysqli, $sql);
                $_SESSION['taikhoan_dk']=$name_user;
                $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);
                header('Location:login.php');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portable - Đăng nhập</title>
    <link rel="stylesheet" href="../CSS/login_CSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
    <h1><a href="../index.php"  style="font-size:30px"><b style="font-size:40px" >H&T </b>fashion</a></h1>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <!-----------------------------------Đăng kí-------------------------->
            <form action="" method="POST" name="dangki_taikhoan" >
                <h1>Tạo tài khoản</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>hoặc đăng kí tài khoản mới</span>
                <input type="text"     placeholder="Tên người dùng"     name="name_user"  class="input_value" required/>
                <input type="text"    placeholder="Tài khoản"          name="user_dk"     class="input_value" required/>
                <input type="password" placeholder="Mật khẩu"           name="psw_dk"     class="input_value" required/>
                <input type="number"   placeholder="Số điện thoại"      name="phone_dk"   class="input_value" required/>
                <input type="text"     placeholder="Địa chỉ"            name="address_dk" class="input_value" required/>
                <button type="submit" name="dangki" style="cursor:pointer;">Đăng kí</button>
            </form>
            <!----------------------------------X------------------------------------->
        </div>
        <div class="form-container sign-in-container">
            <!-------------Đăng nhập----------------------------------------------->
            <form action="" method="POST">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản hiện có</span>
                <input type="text"     placeholder="Tài khoản" name="user"     class="input_value" required>
                <input type="password" placeholder="Mật khẩu"  name="password" class="input_value" required>
                <a href="#">Quên mật khẩu</a>
                <button type="submit" value="login" name="dangnhap" style="cursor:pointer;">Đăng nhập</button>
            </form>
            <!--------------------------X----------------------------------------->
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng trờ lại!</h1>
                    <p>Để kết nối với chúng tôi, bạn vui lòng đăng nhập vào shop</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn mới!</h1>
                    <p>Hãy gia nhập và trải nghiệm những sản phẩm thú vị mà tôi mang lại cho bạn.</p>
                    <button class="ghost" id="signUp">Đăng kí</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    
</script>
</html>