<?php
    if(isset($_POST['xacnhan'])){
        $sdt = $_POST['sdt'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $rpass = $_POST['rpass'];
        $err = [];

        if(empty($sdt)){
            $err['sdt'] = "bạn chưa nhập số điện thoại";
        }
        if(empty($username)){
            $err['username'] = "bạn chưa nhập tên tài khoản";
        }
        if(empty($pass)){
            $err['pass'] = "bạn chưa nhập mật khẩu";
        }
        if(empty($rpass)){
            $err['rpass'] = "bạn chưa nhập lại mật khẩu";
        }
        if($pass != $rpass){
            $err['repass'] = "mật khẩu nhập lại không đúng";
        }

        if(empty($err)){
        $LaySdt_Username = LaySdt_Username($conn, $sdt, $username);
            if(mysqli_num_rows($LaySdt_Username)>0){
                $pass = md5($pass);
                $sql = "UPDATE taikhoan SET pass = '$pass' WHERE sdt = $sdt AND username = '$username'";
                mysqli_query($conn, $sql);
                if(mysqli_query($conn, $sql)){
                    $thongbao = "đặt mật khẩu mới thành công, giờ bạn có thể đăng nhập lại";
                }else{
                    $thongbao = "thao tác thất bại, vui lòng thử lại sau";
                }
            }else{
                $thongbao = "không tìm thấy tài khoản và số điện thoại, vui lòng thử lại sau";
            }
        }
    }
?>
<div class="row" >
       <div class="login">
            <div class="container">
                <div class="register__form">
                    <form action="main.php?act=quenmk" method="POST">
                        <div class="register__form-title">
                            Đặt Mật Khẩu Mới
                        </div>
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Số Điện Thoại" name="sdt"> <br>
                        <span style="color:red"><?php echo (isset($err['sdt']))?$err['sdt']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Tên Đăng Nhập" name="username"> <br>
                        <span style="color:red"><?php echo (isset($err['username']))?$err['username']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="password" placeholder="Mật Khẩu" name="pass"> <br>
                        <span style="color:red"><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="password" placeholder="Nhập Lại Mật Khẩu" name="rpass"> <br>
                        <span style="color:red"><?php echo (isset($err['repass']))?$err['repass']:''?></span> <br>
                        <?php if(isset($thongbao)){?>
                            <span style="color: red"><?php echo $thongbao ?></span> <br>
                        <?php }else{?>
                        <button type="submit" class="btnanimation" name="xacnhan">Đăng Kí</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
       </div>
   </div>