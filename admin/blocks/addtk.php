<?php
    $err = [];
    if(isset($_POST['addtk'])){
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
<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Tài Khoản Mới</h5>
                    </div>
                    <a href="mainad.php?act=taikhoan" style="margin: 0 0 0px 30px">Quay Lại</a>
                    <div class="card-body">
                      <form action="mainad.php?act=addtk" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Họ Tên</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="hoten"/>
                            <span style="color: red"><?php echo (isset($err['hoten']))?$err['hoten']:''?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Địa Chỉ</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="diachi"/>
                            <span style="color: red"><?php echo (isset($err['diachi']))?$err['diachi']:''?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Số Điện Thoại</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="sdt"/>
                            <span style="color: red"><?php echo (isset($err['sdt']))?$err['sdt']:''?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Giới Tính</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="gioitinh"/>
                            <span style="color: red"><?php echo (isset($err['gioitinh']))?$err['gioitinh']:''?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="username"/>
                            <span style="color: red"><?php echo (isset($err['username']))?$err['username']:''?></span>
                            <span style="color: red"><?php echo (isset($err['arr_username']))?$err['arr_username']:''?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="basic-default-name" name="pass"/>
                            <span style="color: red"><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nhập Lại Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="basic-default-name" name="rpass"/>
                            <span style="color: red"><?php echo (isset($err['rpass']))?$err['rpass']:''?></span>
                            <span style="color: red"><?php echo (isset($err['repass']))?$err['repass']:''?></span>
                            <span style="color: red;"><?php echo (isset($thongbao))?$thongbao:'' ?></span> <br>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name = "addtk" class="btn btn-primary">Thêm</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
