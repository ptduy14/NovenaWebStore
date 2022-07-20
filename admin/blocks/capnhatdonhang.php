<?php
    if(isset($_GET['iddonhang'])){
        $iddonhang = $_GET['iddonhang'];
        $LayDonHangTheoId = LayDonHangTheoId($conn,$iddonhang);
        $LayDonHangTheoId = mysqli_fetch_array($LayDonHangTheoId);
        extract($LayDonHangTheoId);
    }       

    // xử lí cập nhật
    if(isset($_POST['capnhat'])){
        $iddonhang = $_POST['iddonhang'];
        $trangthai = $_POST['trangthai'];
        if($trangthai == 'Đang Xử Lí'){
            $trangthai = 0;
        }else{
            $trangthai = 1;
        }
        $CapNhatDonHang = CapNhatDonHang($conn,$iddonhang, $trangthai);
        header('location: mainad.php?act=alldh');
    }
?>
<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Cập nhật đơn hàng</h5>
                    </div>
                    <a href="mainad.php?act=taikhoan" style="margin: 0 0 0px 30px">Quay Lại</a>
                    <div class="card-body">
                      <form action="mainad.php?act=capnhatdonhang" method="POST">
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Trạng Thái</label>
                          <div class="col-sm-10">
                                <select name="trangthai">
                                    <?php 
                                        $option = array('Đang Xử Lí','Hoàn Thành');
                                        foreach ($option as $option) {
                                            echo '<option value="'.$option.'">'.$option.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                          <input type="hidden" name = "iddonhang" value="<?= $iddonhang?>">
                            <button type="submit" name = "capnhat" class="btn btn-primary">Cập Nhật</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>