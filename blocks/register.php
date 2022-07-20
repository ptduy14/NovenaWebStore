<?php
    $err = [];
    if(isset($_POST['dangki'])){
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $rpass = $_POST['rpass'];

        // kiểm tra điều kiện các trường
        if(empty($hoten)){
            $err['hoten'] = "bạn chưa nhập họ tên";
        }
        if(empty($gioitinh)){
            $err['gioitinh'] = "bạn chưa chọn giới tính";
        }
        if(empty($diachi)){
            $err['diachi'] = "bạn chưa nhập địa chỉ";
        }
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
        $LayTaiKhoan = LayTaiKhoan($conn);
        $arr_username = array();
        while($row = mysqli_fetch_array($LayTaiKhoan)){
            $arr_username[] = $row['username'];
        }
        for($i = 0; $i < count($arr_username); $i++){
            if($arr_username[$i] === $username ){
                $err['arr_username'] = "tên tài khoản đã tồn tại";
            }
        }
        if(empty($err)){
            $pass = md5($pass);
            $DangKiTaiKhoan =  DangKiTaiKhoan($conn,$hoten,$gioitinh,$diachi,$sdt,$username,$pass);
            $thongbao = "tạo tài khoản thành công";   
        }
    }
?>
<div class="row" >
       <div class="login">
            <div class="container">
                <div class="register__form">
                    <form action="main.php?act=dangki" method="POST">
                        <div class="register__form-title">
                            Đăng Kí
                        </div>
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Họ Tên" name="hoten"> <br>
                        <span style="color: red"><?php echo (isset($err['hoten']))?$err['hoten']:''?></span>
                        <p  style = "margin: 10px 0;">Giới Tính</p>
                        Nam <input style = "margin-right: 10px;" type="radio" value="nam" name="gioitinh">
                        Nữ <input style = "margin-right: 10px;" type="radio" value="nữ" name="gioitinh">
                        Khác <input type="radio" value="khác" name="gioitinh"><br>
                        <span style="color:red"><?php echo (isset($err['gioitinh']))?$err['gioitinh']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Địa Chỉ" name="diachi"> <br>
                        <span style="color:red"><?php echo (isset($err['diachi']))?$err['diachi']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Số Điện Thoại" name="sdt"> <br>
                        <span style="color:red"><?php echo (isset($err['sdt']))?$err['sdt']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Tên Đăng Nhập" name="username"> <br>
                        <span style="color:red"><?php echo (isset($err['username']))?$err['username']:''?></span>
                        <span style="color:red"><?php echo (isset($err['arr_username']))?$err['arr_username']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="password" placeholder="Mật Khẩu" name="pass"> <br>
                        <span style="color:red"><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                        <input style = "margin: 10px 0; height: 30px;" type="password" placeholder="Nhập Lại Mật Khẩu" name="rpass"> <br>
                        <span style="color:red"><?php echo (isset($err['repass']))?$err['repass']:''?></span> <br>
                        <span style="color: red;"><?php echo (isset($thongbao))?$thongbao:'' ?></span> <br>
                        <button type="submit" class="btnanimation" name="dangki">Đăng Kí</button>
                    </form>
                </div>
            </div>
       </div>
   </div>