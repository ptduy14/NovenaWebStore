<?php
    if(isset($_GET['idsp'])){
        $idsanpham = $_GET['idsp'];
        $sanpham = LaySp($conn, $idsanpham);
        $sp = mysqli_fetch_array($sanpham);
        $sp['soluong'] = 1;
        if(!isset($_SESSION['giohang'])){
            $_SESSION['giohang'][$idsanpham] = $sp;
        }else{
            $check = 0;
            foreach ($_SESSION['giohang'] as $key => $value) {
                if($value['idsanpham'] == $idsanpham){
                    $check = 1;
                    $_SESSION['giohang'][$idsanpham]['soluong'] += 1;
                    break;
                }
            }
            if( $check == 0){
                $_SESSION['giohang'][$idsanpham] = $sp;
            }
        }
    }

    // đặt hàng
    if(isset($_POST['dathang']) && $_SESSION['giohang'] != NULL){
        $nguoinhan = $_POST['nguoinhan'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $ghichu = $_POST['ghichu'];
        $idtaikhoan = $_POST['idtaikhoan'];
        $err = [];
        if(empty($nguoinhan)){
            $err['nguoinhan'] = "*bạn chưa nhập tên người nhận*";
        }
        if(empty($diachi)){
            $err['diachi'] = "*bạn chưa nhập địa chỉ*";
        }
        if(empty($sdt)){
            $err['sdt'] = "*bạn chưa nhập số điện thoại*";
        }
        if(empty($err) && $_SESSION['giohang'] != NULL){
            // inser vào bảng đơn đặt hàng
            $DatHang =  DatHang($conn, $nguoinhan, $diachi, $sdt, $ghichu, $idtaikhoan);
            $_SESSION['dathang'] = 0;
            if($DatHang){ // nếu đặt hàng thành công thì sẽ tiến hành insert bảng ctdonhang
                $iddonhang = LayIdDonHang($conn, $idtaikhoan);
                $row = mysqli_fetch_array($iddonhang);
                 // inser vào bảng chi tiết đơn hàng
                foreach ($_SESSION['giohang'] as $key => $value) {
                    $thanhtien = $value['soluong'] * $value['gia'];
                    $sql = "INSERT INTO `ctdonhang` (`iddonhang`, `idsanpham`, `soluong`, `thanhtien`) 
                            VALUES ('".$row['iddonhang']."', '".$value['idsanpham']."', '".$value['soluong']."', $thanhtien)";
                    mysqli_query($conn, $sql);
                }
                // cập nhật tổng tiền trong bảng đơn hàng
                $sql = "UPDATE dondathang SET tongtien = (	SELECT SUM(thanhtien) AS tongtien
                                                            FROM ctdonhang
                                                            WHERE iddonhang = '".$row['iddonhang']."')
                                                            WHERE iddonhang = '".$row['iddonhang']."'";
                 mysqli_query($conn, $sql);
                 $_SESSION['dathang']  = 1;
            }
            if( $_SESSION['dathang']  == 1){
                unset($_SESSION['giohang']);
                ?>
                    <script>
                            window.alert("Đặt Hàng Thành Công Giờ Bạn Có Thẻ Vào Đơn Hàng Để Xem <3 <3 (づ ◕‿◕ )づ !!");
                    </script>
                <?php
            }
        }
    }
        ?>
<div class="row mrb">
        <div class="container">
            <div class="giohang">
                <div class="giohang__product">
                    <a style="margin: 10px 0" href="main.php">Quay Lại Trang Chủ</a>
                    <h3 style="margin: 10px 0">Giỏ Hàng Của Bạn <?php echo  $idsanpham?></h3>
                    <form action="main.php?act=dathang" method="POST">
                    <table>
                        <tr style="height: 30px;">
                            <th style="width:50px">STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th style="width:100px;">Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Tùy Chọn</th>
                        </tr>
                            <style>
                                td{
                                    text-align: center;
                                }
                                .btnreduce{
                                    display: inline-block;
                                    padding: 10px 10px;
                                    background-color: #223a66;
                                    margin-right:10px
                                }
                                .btnincrese{
                                    display: inline-block;
                                    padding: 10px 10px;
                                    background-color: #223a66;
                                    margin-left:10px
                                }
                                .btnreduce > a{
                                    color: white;
                                    text-decoration: none;
                                    font-size:20px
                                }
                                .btnincrese > a{
                                    color: white;
                                    text-decoration: none;
                                    font-size:20px
                                }
                                td > .btnreduce:hover{
                                    background-color: #e12454;
                                    cursor: pointer;
                                }
                                td > .btnincrese:hover{
                                    background-color: #e12454;
                                    cursor: pointer;
                                }
                            </style>

                            <?php 
                                if(isset($_SESSION['giohang'])){
                                    $tongtien = 0;
                                    $i=0;
                                    foreach ($_SESSION['giohang'] as $key => $value) {
                                        $thanhtien = $value['soluong'] * $value['gia'];
                                        // $idsanphamasc = "main.php?act=update_cart&type=asc&idsp=".$_SESSION['giohang'][$i]['idsanpham'];
                                        $sltang = "main.php?act=update_cart&type=tang&idcart=".$value['idsanpham'];
                                        $slgiam = "main.php?act=update_cart&idcart=".$value['idsanpham'];
                                        // $idsanphamdele ="main.php?act=del_pro-cart&idcart=".$_SESSION['giohang'][$i]['idsanpham'];
                                        
                                        echo '  <tr>
                                                <td>'.($i+1).'</td>
                                                <td style="width:350px;">'.$value['tensanpham'].'</td>
                                                <td><div class="giohang__product-img"><img src="img/sanpham/'.$value['hinhanh'].'" alt=""></div></td>
                                                <td>'.$value['gia'].'$</td>
                                                <td><div class="btnreduce btnanimation"><a href="'.$slgiam.'">-</a></div>'.$value['soluong'].'<div class="btnincrese btnanimation"><a href="'.$sltang.'">+</a></div></td>
                                                <td>'.$thanhtien.'$</td>
                                                <td><a href="main.php?act=del_pro-cart&idcart='.$value['idsanpham'].'">Xóa</a></td>
                                                </tr>';
                                        $tongtien += $thanhtien;
                                    }
                                }
                            ?>
                        <tr style="background-color :#223a66; height: 30px;">
                            <td></td>
                            <td style="color: white;">Tổng Tiền</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="color: white;"><?php echo ($tongtien) ?>$</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <?php
                    if(isset($_SESSION['taikhoan'])){
                        $taikhoan = $_SESSION['taikhoan'];
                    }
                ?>
                <div class="giohang__info">
                    <h4 style="margin:10px 0">thông tin nhận hàng</h4>
                    <label for="">Người Nhận</label> <br>
                    <input type="text" name="nguoinhan" id="" value="<?= $taikhoan['hoten']?>"><span style="margin-left:10px; color:red"><?php echo (isset($err['nguoinhan'])?$err['nguoinhan']:'') ?></span><br>
                    <label for="">Địa Chỉ</label> <br>
                    <input type="text" name="diachi" id="" value="<?= $taikhoan['diachi']?>"><span style="margin-left:10px; color:red"><?php echo (isset($err['diachi'])?$err['diachi']:'') ?></span> <br>
                    <label for="">Số Điện Thoại</label> <br>
                    <input type="text" name="sdt" id="" value="<?= $taikhoan['sdt']?>"><span style="margin-left:10px; color:red"><?php echo (isset($err['sdt'])?$err['sdt']:'') ?></span>  <br>
                    <label for="">Ghi Chú</label> <br>
                    <input style="height: 60px" type="text" name="ghichu" id=""> <br>
                    <input type="hidden" name="idtaikhoan" value="<?= $taikhoan['idtaikhoan']?>">
                    <button style="color:white" class="btnanimation" type="submit" name="dathang">Xác Nhận Đặt Hàng</button>
                    <p>*Các bạn vui lòng kiểm tra thông tin thật kĩ trước khi nhận hàng*</p>
                </div>
                </form>
            </div>
        </div>
    </div>
