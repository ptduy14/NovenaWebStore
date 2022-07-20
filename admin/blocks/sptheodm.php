<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Danh Mục Sản Phẩm</h5>
                <a href="mainad.php?act=danhmucsp" style="margin: 0 0 20px 30px">Quay Lại</a>
                <div class="table-responsive text-nowrap">
                <style>
                .img_prduct{
                    height: 60px;
                }
                .img_prduct img{
                    height: 100%;
                }
                </style>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    if(isset($_GET['iddanhmuc'])){
                        $iddanhmuc = $_GET['iddanhmuc'];
                    }
                    $LaySpThepDm = LaySpThepDm($conn, $iddanhmuc);

                    if(mysqli_fetch_array($LaySpThepDm) == 0){
                        echo '<h4 style="margin: 0 0 20px 30px"> Danh Mục Này Chưa Có Sản Phẩm Nào</h4>';
                    }else{
                    $i = 0;
                    foreach ($LaySpThepDm as $sp) {
                        $i += 1;
                        extract($sp);
                            echo ' <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$i.'</strong></td>
                                    <td>'.$tensanpham.'</td>
                                    <td><div class="img_prduct"><img src="../img/sanpham/'.$hinhanh.'" alt=""></div></td>
                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            ><i class="bx bx-trash me-1"></i> Delete</a
                                        >
                                        </div>
                                    </div>
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

    </div>
