<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Đơn Hàng Của Khách Hàng</h5>
                <a href="mainad.php?act=taikhoan" style="margin: 0 0 20px 30px">Quay Lại</a>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Sản Phẩm</th>
                        <th>Người Nhận</th>
                        <th>Địa Chỉ</th>
                        <th>Thời Gian Tạo Đơn</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th>Tổng Tiền Cho Từng Đơn Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    if(isset($_GET['idtaikhoan'])){
                        $idtaikhoan = $_GET['idtaikhoan'];
                    }
                    $LayDonHang = LayDonHang($conn, $idtaikhoan);
                    $i = 0;
                    foreach ($LayDonHang as $dh) {
                        $i += 1;
                        extract($dh);
                            echo ' <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$iddonhang.'</strong></td>
                                    <td>'.$tensanpham.'</td>
                                     <td>'.$nguoinhan.'m</a></td>
                                     <td>'.$diachi.'</td>
                                     <td>'.$ngaydathang.'</td>
                                     <td>'.$soluong.'</td>
                                     <td>'.$thanhtien.'$</td>
                                     <td>'.$tongtien.'$</td>
                                     <td>'.(($trangthai == 0)?'Đang Xử Lí':'Hoàn Thành').'</td>
                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="mainad.php?act=capnhatdonhang&iddonhang='.$iddonhang.'"
                                            ><i class="bx bx-edit-alt me-1"></i> Cập Nhật Đơn Hàng</a
                                        >
                                        <a class="dropdown-item" href="mainad.php?act=xoadonhang&iddonhang='.$iddonhang.'"
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
