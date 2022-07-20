<?php
    if(isset($_SESSION['taikhoan'])){
        extract($_SESSION['taikhoan']);
        $result = LayDonHang($conn, $idtaikhoan);
    }  
?>
<div class="row mrb">
        <div class="container">
            <div class="giohang">
                <div class="giohang__product">
                    <a style="margin: 10px 0" href="main.php">Quay Lại Trang Chủ</a>
                    <h3 style="margin: 10px 0">Đơn Hàng Của Bạn</h3>
                    <table>
                        <tr style="height: 30px;">
                            <th style="width:50px">Mã Đơn Hàng</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th style="width:100px;">Số Lượng</th>
                            <th>Thành Tiền</th>
                        </tr>
                            <?php
                                $i = 1;
                                $tongtien = 0;
                                foreach ($result as $key => $value) {
                                    echo '<tr>
                                            <td>'.$value['iddonhang'].'</td>
                                            <td style="width:350px;">'.$value['tensanpham'].'</td>
                                            <td><div class="giohang__product-img"><img src="img/sanpham/'.$value['hinhanh'].'" alt=""></div></td>
                                            <td>'.$value['soluong'].'</td>
                                            <td>'.$value['thanhtien'].'$</td>
                                        </tr>';
                                        $tongtien += $value['thanhtien'];
                                }
                            ?>
                        <tr style="background-color :#223a66; height: 30px;">
                            <td colspan="2" style="color: white;">Tổng Tiền</td>
                            <td colspan="8"style="color: white;"><?php echo $tongtien?>$</td>
                        </tr>
                    </table>
                    <!-- chitiet don hang -->
                    <h4  style="margin:100px 0 20px 0">Thông Tin Đơn Hàng</h4>
                    <table>
                        <tr style="height: 30px;">
                            <th>Mã Đơn Hàng</th>
                            <th>Mã Sản Phẩm</th>
                            <th style="width:100px;">Số Lượng Sản Phẩm</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Người Nhận</th>
                            <th>Địa Chỉ</th>
                            <th>số điện thoại</th>
                            <th>Tổng Tiền Cho Từng Đơn Hàng</th>
                        </tr>
                            
                            <?php
                                $tongtien = 0;
                                
                                foreach ($result as $key => $value) {
                                    echo '<tr style ="height: 50px">
                                            <td>'.$value['iddonhang'].'</td>
                                            <td>'.$value['idsanpham'].'</td>
                                            <td>'.$value['soluong'].'</td>
                                            <td>'.$value['ngaydathang'].'</td>
                                            <td>'.$value['nguoinhan'].'</td>
                                            <td>'.$value['diachi'].'</td>
                                            <td>'.$value['sdt'].'</td>
                                            <td >'.$value['tongtien'].'$</td>
                                        </tr>';
                                }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>