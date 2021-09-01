<?php    
    session_start();
    include('../config/config.php');
    //-----Giảm số lượng--------//
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                          'soluong' => $cart_item['soluong'], 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                           );
                $_SESSION['cart']=$product;
            }else{
                $soluong=$cart_item['soluong'] - 1;
                if($cart_item['soluong']>=1){
                    $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                          'soluong' => $soluong, 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                           );
                }else{
                    $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                          'soluong' => $cart_item['soluong'], 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                           );
                }
                $_SESSION['cart']=$product;
            }   
        }
        header('Location:cart.php'); 
    }
    //-----Tăng số lượng-------//
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                          'soluong' => $cart_item['soluong'], 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                           );
                $_SESSION['cart']=$product;
            }else{
                $soluong=$cart_item['soluong'] + 1;
                $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                          'soluong' => $soluong, 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                           );
                $_SESSION['cart']=$product;
            }
        }     
        header('Location:cart.php');   
    }
    //---------Xóa tất cả----------//
    if(isset($_GET['xoatatca'])){
        unset($_SESSION['cart']);
        header('Location:cart.php');
    }
    //---------Xóa sản phẩm bất kì --------//
    if(isset($_GET['xoa_id']) && isset($_SESSION['cart'])){
        $id = $_GET['xoa_id'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                        $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                                    'soluong' => $cart_item['soluong'], 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                                    );
        }
        }
        $_SESSION['cart']=$product;
        header('Location:cart.php');
    }
    //------------Lưu giỏ hàng------------------//
    if(isset($_POST['themgiohang']) || isset($_GET['id_yeuthich']) || isset($_GET['id_sanpham'])){   
        if(isset($_POST['themgiohang'])){
            $id=$_GET['idsanpham'];
        }else{
            if(isset($_GET['id_sanpham'])){
                $id=$_GET['id_  sanpham'];
            }else{
                $id=$_GET['id_yeuthich'];
            }
        }
        $soluong=1;
        $sql="SELECT * FROM sanpham WHERE id='".$id."' LIMIT 1";
        $query= mysqli_query($mysqli,$sql);
        $row= mysqli_fetch_array($query);
        if($row){
            $new_product[]=array('id' => $id, 'tensp'=> $row['name'],'giasp' => $row['price'], 
            'soluong' => $soluong, 'anhsp'=> $row['image'], 'mausp'=> $row['color'], 'kichthuoc' => $row['size']
            );
            
            //----Kiểm tra giỏ hàng có tồn tại không----//
            if(isset($_SESSION['cart'])){
                $found=false;
                foreach($_SESSION['cart'] as $cart_item  ){
                    if( $cart_item['id']== $id ){
                        $soluong=$cart_item['soluong'] + 1;
                        $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                        'soluong' => $soluong, 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                        );
                        $found=true;
                    }else{
                        $product[]=array('id' => $cart_item['id'], 'tensp'=> $cart_item['tensp'],'giasp' => $cart_item['giasp'], 
                        'soluong' => $cart_item['soluong'], 'anhsp'=> $cart_item['anhsp'], 'mausp'=> $cart_item['mausp'], 'kichthuoc' => $cart_item['kichthuoc']
                        );
                    }
                }
                if($found==false){
                    $_SESSION['cart']=array_merge($product,$new_product);                 
                }else{
                    $_SESSION['cart']=$product;
                }
            }else{ 
                $_SESSION['cart']= $new_product;
            }
        }
        if(isset($_POST['themgiohang']) || isset($_GET['id_sanpham'])){
            header('Location:cart.php');

        }else{
            header('Location:../index.php');
        }
    }
?>