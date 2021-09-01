
<table border="1" class="table table-striped table-hover">
    <tr>
        <td>Thứ tự</td>
        <td>Tên</td>
        <td>Tài khoản</td>
        <td>Mật khẩu</td>
        <td>Số điện thoại</td>
    </tr>
    <?php 
        $sql="SELECT * FROM ds_dangki ORDER BY id_dk ASC";
        $query= mysqli_query($mysqli, $sql);
        $i=0;
        while($dong_user = mysqli_fetch_array($query)){
            $i++;
    ?>
    <tr>
        <td>
            <?php
                echo $i;
            ?>
        </td>
        <td>
            <?php
                echo $dong_user['ten_user'];
            ?>
        </td>
        <td>
            <?php
                echo $dong_user['user_dk'];
            ?>
        </td>
        <td>
            <?php
                echo $dong_user['password_dk'];
            ?>
        </td>
        <td>
            <?php
                echo $dong_user['user_dk'];
            ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>