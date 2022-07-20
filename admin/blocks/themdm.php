<?php
    if(isset($_POST['addcaterogy'])){
        $tendanhmuc = $_POST['tendanhmuc'];
        $err = [];
        if(empty($tendanhmuc)){
            $err['tendanhmuc'] = "bạn chưa điền tên danh mục";
        }
        if(empty($err)){
            $LayDanhMucSp = LayDanhMucSp($conn);
            $i = 0;
            while($row = mysqli_fetch_array($LayDanhMucSp)){
                if($row['tendanhmuc'] ==  $tendanhmuc){
                    $err['tendanhmuc'] = "đã có tên danh mục này trong cơ sở dữ liệu";
                    $i = 1;
                    break;
                }
            }
            if($i == 0){
                $ThemDanhMuc = ThemDanhMuc($conn,$tendanhmuc);
                header('location: mainad.php?act=danhmucsp');
            }

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
                      <h5 class="mb-0">Thêm Danh Mục Mới</h5>
                    </div>
                    <a href="mainad.php?act=danhmucsp" style="margin: 0 0 0px 30px">Quay Lại</a>
                    <div class="card-body">
                      <form action="mainad.php?act=themdm" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Danh Mục</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="tendanhmuc"/>
                            <span><?php echo (isset($err['tendanhmuc']))?$err['tendanhmuc']:'' ?></span>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name = "addcaterogy" class="btn btn-primary">Thêm</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->