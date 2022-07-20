<?php
     $LayDanhMucSp = LayDanhMucSp($conn);
    if(isset($_POST['themsp'])){
        $tensanpham = $_POST['tensanpham'];
        $gia = $_POST['gia'];
        $iddanhmuc = $_POST['iddanhmuc'];
        if(isset($_FILES['hinhanh'])){
            $hinhanh = $_FILES['hinhanh'];
            $ten_hinhanh = $hinhanh['name'];
            move_uploaded_file($hinhanh['tmp_name'], '../img/sanpham/'.$ten_hinhanh);
        }

        ThemSp($conn, $tensanpham,$gia,$iddanhmuc,$ten_hinhanh);
        header('location: mainad.php?act=sanpham');
    }
?>
<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Thêm Danh Sản Phẩm Mới</h5>
                    </div>
                    <a href="mainad.php?act=sanpham" style="margin: 0 0 0px 30px">Quay Lại</a>
                    <div class="card-body">
                      <form action="mainad.php?act=themsp" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Sản Phẩm</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="tensanpham"/>
                            <span><?php echo (isset($err['tendanhmuc']))?$err['tendanhmuc']:'' ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Giá</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="gia"/>
                            <span><?php echo (isset($err['tendanhmuc']))?$err['tendanhmuc']:'' ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Hình Ảnh</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" id="basic-default-name" name="hinhanh"/>
                            <span><?php echo (isset($err['tendanhmuc']))?$err['tendanhmuc']:'' ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Danh Mục</label>
                          <div class="col-sm-10">
                                <select name="iddanhmuc">
                                    <?php
                                        foreach ($LayDanhMucSp as $dm) {
                                            extract($dm);
                                            echo '<option value="'.$iddanhmuc.'">'.$tendanhmuc.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name = "themsp" class="btn btn-primary">Thêm</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->