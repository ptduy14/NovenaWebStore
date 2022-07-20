<?php
    if(isset($_GET['idtaikhoan'])){
        $idtaikhoan = $_GET['idtaikhoan'];
        $LayTkTheoId = LayTkTheoId($conn, $idtaikhoan);
        $LayTkTheoId = mysqli_fetch_array($LayTkTheoId);
        extract($LayTkTheoId);
        $LayLoaitk = LayLoaitk($conn);
    }

    // lấy dữ liệu từ form về

    if(isset($_POST['edittk'])){
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $idloaitk = $_POST['idloaitk'];
        $idtaikhoan = $_POST['idtaikhoan'];
        $EditTkAdmin = EditTkAdmin($conn,$hoten,$gioitinh,$diachi,$sdt,$idtaikhoan,$idloaitk);
        header('location: mainad.php?act=taikhoan');
    }
?>
<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Chỉnh Sửa Tài Khoản <?= $hoten ?></h5>
                    </div>
                    <a href="mainad.php?act=taikhoan" style="margin: 0 0 0px 30px">Quay Lại</a>
                    <div class="card-body">
                      <form action="mainad.php?act=edittk" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Họ Tên</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" value="<?=$hoten?>" name="hoten"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Giới Tính</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" value="<?=$gioitinh?>" name="gioitinh"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Địa Chỉ</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" value="<?=$diachi?>" name="diachi"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Số Điện Thoại</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" value="<?=$sdt?>" name="sdt"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Quyền Hệ Thống</label>
                          <div class="col-sm-10">
                                <select name="idloaitk">
                                    <?php
                                        foreach ($LayLoaitk as $ltk) {
                                            extract($ltk);
                                            echo '<option value="'.$idloaitk.'">'.$tenloai.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                          <input type="hidden" name = "idtaikhoan" value="<?= $idtaikhoan?>">
                            <button type="submit" name = "edittk" class="btn btn-primary">Cập Nhật</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->