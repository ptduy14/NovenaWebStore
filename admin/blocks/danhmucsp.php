<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Danh Mục Sản Phẩm</h5>
                <a href="mainad.php?act=themdm" style="margin: 0 0 20px 30px">Thêm Danh Mục Mới</a>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên Danh Mục</th>
                        <th>Xem Sản Phẩm Thuộc Danh Mục Này</th>
                        <th>Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $LayDanhMucSp = LayDanhMucSp($conn);
                    $i = 0;
                    foreach ($LayDanhMucSp as $dm) {
                        $i += 1;
                        extract($dm);
                            echo ' <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$i.'</strong></td>
                                    <td>'.$tendanhmuc.'</td>
                                     <td><a href="mainad.php?act=sptheodm&iddanhmuc='.$iddanhmuc.'">Xem</a></td>
                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <a class="dropdown-item" href="mainad.php?act=xoadm&iddanhmuc='.$iddanhmuc.'"
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
