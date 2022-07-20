<div class="container-xxl flex-grow-1 container-p-y">
            <style>
                .img_prduct{
                    height: 60px;
                }
                .img_prduct img{
                    height: 100%;
                }
            </style>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Danh Mục Sản Phẩm</h5>
                <a href="mainad.php?act=themsp" style="margin: 0 0 0px 30px">Thêm Sản Phẩm Mới</a>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Giá</th>
                        <th>Danh Mục</th>
                        <th>Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $LaySpvaDm = LaySpvaDm($conn);
                    $i = 0;
                    foreach ($LaySpvaDm as $sp) {
                        $i += 1;
                        extract($sp);
                            echo ' <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$i.'</strong></td>
                                    <td>'.$tensanpham.'</td>
                                    <td><div class="img_prduct"><img src="../img/sanpham/'.$hinhanh.'" alt=""></div></td>
                                    <td>'.$gia.'$</td>
                                    <td>'.$tendanhmuc.'</td>
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
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

    </div>
