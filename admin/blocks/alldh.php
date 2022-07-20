<div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Đơn Hàng Trong Hệ Thống</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Người Nhận</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Ghi Chú</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $LayAllDh =  LayAllDh($conn);
                    $i = 0;
                    $j = 0;
                    foreach ($LayAllDh as $dh) {
                        extract($dh);
                        if($trangthai == 0){
                            $i += 1;
                        }else{
                            $j += 1;
                        }
                            echo ' <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$iddonhang.'</strong></td>
                                    <td>'.$ngaydathang.'</td>
                                     <td>'.$nguoinhan.'m</a></td>
                                     <td>'.$diachi.'</td>
                                     <td>'.$sdt.'</td>
                                     <td>'.$ghichu.'</td>
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
                    <tr>
                        <td>Tổng Đơn Hàng Đang Được Xử Lí: <?=$i ?></td>
                    </tr>
                    <tr>
                        <td>Tổng Đơn Hàng Đã Hoàn Thành: <?=$j ?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

    </div>
