<?php 
    if(isset($_SESSION['taikhoan'])){
        extract($_SESSION['taikhoan']);
    }

    if(isset($_POST['update'])){
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $username = $_POST['username'];
        // lấy usernaem trong database để check
        $LayTaiKhoan = LayTaiKhoan($conn);
        $arr_username = array();
        while($row = mysqli_fetch_array($LayTaiKhoan)){
            $arr_username[] = $row['username'];
        }
        for($i = 0; $i < count($arr_username); $i++){
            if($arr_username[$i] ===  $username ){
                $thongbao = "tên tài khoản đã tồn tại vui lòng thử lại sau !!";
            }else{
                $UpdateTaiKhoan = UpdateTaiKhoan($conn,$hoten,$gioitinh,$diachi,$sdt,$username,$idtaikhoan);
                if($UpdateTaiKhoan){
                $thongbao = "cập nhật thành công !!";
                }else{
                $thongbao = 'cập nhật thất bại !!';
                }
            }
        }
    }

?>
<div class="row" >
       <div class="login">
            <div class="container">
                <div class="register__form">
                    <form action="main.php?act=update_acc" method="POST">
                        <div class="register__form-title">
                            Cập Nhật Tài Khoản
                        </div>
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Họ Tên" name="hoten" value="<?= $hoten?>"> <br>
                        <input  style = "margin: 10px 0; height: 30px;" type="text" placeholder="Giới Tính" value="<?=$gioitinh?>" name="gioitinh"><br>
                        
                      
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Địa Chỉ" name="diachi" value="<?= $diachi?>"> <br>
                     
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Số Điện Thoại" name="sdt" value="<?= $sdt?>"> <br>
                    
                        <input style = "margin: 10px 0; height: 30px;" type="text" placeholder="Tên Đăng Nhập" name="username" value="<?= $username?>"> <br>
                        <input type="hidden" name = "idtaikhoan" value="<?= $idtaikhoan?>">
                        <?php 
                            if(isset($thongbao)){
                        ?>
                             <span style="color:red"><?php echo $thongbao ?></span>
                        <?php
                            }else{
                        ?>
                        <button type="submit" class="btnanimation" name="update">Xác Nhận</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
       </div>
   </div>