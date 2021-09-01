
<table border="1" class="table table-striped table-hover">
    <tr>
        <td>Thứ tự</td>
        <td>Danh sách quản trị viên</td>
        <td>Tài khoản</td>
    </tr>
    <?php 
        $sql="SELECT * FROM admin_acc ORDER BY id_admin ASC LIMIT 10";
        $query= mysqli_query($mysqli, $sql);
        $i=0;
        while($dong_admin = mysqli_fetch_array($query)){
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
                echo $dong_admin['name_admin'];
            ?>
        </td>
        <td>
            <?php
                echo $dong_admin['user'];
            ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>