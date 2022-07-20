<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Danh Mục Sản Phẩm</h5>
                <a href="mainad.php?act=addtk" style="margin: 0 0 20px 30px">Thêm Tài Khoản Mới</a>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Họ Tên</th>
                        <th>Giới Tính</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Username</th>
                        <th>Quyền Hệ Thống</th>
                        <th>Xem Đơn Hàng</th>
                        <th>Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $LayTaiKhoan = LayTaiKhoan($conn);
                    $i = 0;
                    foreach ($LayTaiKhoan as $tk) {
                        $i += 1;
                        extract($tk);
                            echo ' <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$i.'</strong></td>
                                    <td>'.$hoten.'</td>
                                    <td>'.$gioitinh.'</td>
                                    <td>'.$diachi.'</td>
                                    <td>'.$sdt.'</td>
                                    <td>'.$username.'</td>
                                    <td>'.$tenloai.'</td>
                                    
                                    <td>'.(($idloaitk== 2)?'<a href="mainad.php?act=xemdonhang&idtaikhoan='.$idtaikhoan.'">Xem</a>':'').'</td>
                                    
                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="mainad.php?act=edittk&idtaikhoan='.$idtaikhoan.'"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <a class="dropdown-item" href="mainad.php?act=xoatk&idtaikhoan='.$idtaikhoan.'"
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
