<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.min.css">
    <title>Thực Phẩm Chức Năng Novena</title>
</head>
<body>
    <?php
        session_start();
        error_reporting(E_ALL ^ E_WARNING); 
        include "conn.php"; // goi ket noi database
        include "func.php"; // goi cac ham da viet

        //header
        include "blocks/header.php";
        
        //body
        if(isset($_GET['act'])){
            $act = $_GET['act'];
            switch ($act) {
                // controller sản ph
                case 'sanpham':
                    include "blocks/sptheodanhmuc.php";
                    break;
                
                case 'chitietsp':
                    include "blocks/chitietsp.php";
                    break;
                
                // controller tài khoản 
                case 'dangki':
                    include "blocks/register.php";
                    break;

                case'dangnhap':
                    if(isset($_POST['dangnhap'])){
                        $username = $_POST['username'];
                        $pass = $_POST['pass'];
                        $err = [];
                        if(empty($username)){
                            $err['username'] = "bạn chưa nhập tài khoản nữa";
                        }
                        if(empty($pass)){
                            $err['pass'] = "bạn chưa nhập mật khẩu nữa";
                        }
                        if(empty($err)){
                            $pass = md5($pass);
                            $DangNhapTaiKhoan = DangNhapTaiKhoan($conn,$username,$pass);
                            if(mysqli_num_rows($DangNhapTaiKhoan) > 0){
                                // phải chuyển gtri trả về thành mảng mới lưu vô session được
                                $data_acc = mysqli_fetch_array($DangNhapTaiKhoan);
                                if($data_acc['idloaitk'] == 2){
                                    $_SESSION['taikhoan'] =  $data_acc;
                                    header('location: main.php');
                                }else if($data_acc['idloaitk'] == 1){
                                    $_SESSION['taikhoan'] =  $data_acc;
                                    header('location: admin/mainad.php');
                                }
                            
                            }else{
                            $thongbao = "sai tài khoản hoặc mật khẩu";
                            }
                        }
                    }
                    include "blocks/body.php";
                    break;

                case 'logout':
                    session_unset();
                    header('location: main.php');
                    break;

                case 'quenmk':
                    include "blocks/quenmk.php";
                    break;

                case 'update_acc':
                    include "blocks/updateacc.php";
                    break;
                
                // controller giỏ hàng
                case 'giohang':
                    if(!isset($_SESSION['taikhoan'])){
                        include "blocks/body.php";
                    ?>    
                          <script>
                            window.alert("vui lòng đăng nhập hoặc đăng kí để mua hàng của tụi mình nhe <3 <3 (づ ◕‿◕ )づ !!");
                        </script>
                    <?php }else{
                        include "blocks/giohang.php";
                    }
                    break;

                case 'update_cart':
                    $idcart = $_GET['idcart'];
                    if($_GET['type'] =='tang'){
                        $_SESSION['giohang'][$idcart]['soluong'] += 1;
                    }else{
                        if( $_SESSION['giohang'][$idcart]['soluong']>1){
                            $_SESSION['giohang'][$idcart]['soluong'] -= 1;
                        }
                    }
                            
                    header('location: main.php?act=giohang');
                    break;
                    
                case 'del_pro-cart':
                    if(isset($_GET['idcart'])){
                        $idcart = $_GET['idcart'];
                        unset($_SESSION['giohang'][$idcart]);
                    }
                    header('location: main.php?act=giohang');
                    break;
                
                case 'dathang':
                    if(isset($_POST['dathang']) && $_SESSION['giohang'] != NULL){
                        include "blocks/giohang.php";
                    }else{ ?>
                        <script>
                            window.alert("Giỏ hàng bạn đang trống vui lòng kiếm tra lại dùm mình nhen <3 <3 (づ ◕‿◕ )づ !!");
                        </script>
                   <?php   
                    include "blocks/giohang.php"; }
                    break;
                
                // controller đơn hàng
                case 'donhang':
                    extract($_SESSION['taikhoan']);
                    $result = LayDonHang($conn, $idtaikhoan);
                    if(mysqli_num_rows($result) == 0){
                        echo '  <div style="text-align: center;">
                                    <p style="font-size: 80px;">(╯•ᗣ•╰)</p>
                                    <p style="font-size: 40px; margin: 80px 0 50px 0">Bạn Hiện Chưa Có Đơn Hàng Nào</p>
                                </div>';
                    }else{
                        include "blocks/donhang.php";
                    }
                    break;

                default:
                    include "blocks/body.php";
                    break;
            }
        }else{
                    include "blocks/body.php";
        }


        //footer
        include "blocks/footer.php";

    ?>

</body>
