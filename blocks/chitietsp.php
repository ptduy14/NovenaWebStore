<div class="row ">
        <div class="container">
        <div class="row">
            <div class="boxtrai">
                <!--slidershow-->
                    <?php
                        include "slidershow.php";
                    ?>
                <!--chitiet sp-->
                <div class="row" style = "margin: 60px 0">
                    <?php
                        if(isset($_GET['idsanpham'])){
                            $idsanpham = $_GET['idsanpham'];
                            $LayChitietSp = LayChitietSp($conn, $idsanpham);
                            if(mysqli_num_rows($LayChitietSp) > 0){
                            foreach ($LayChitietSp as $sp) {
                            extract($sp);
                            echo '  <div class="img__sp-chitiet">
                                        <img src="img/sanpham/'.$hinhanh.'" alt="">
                                        <button class="btnanimation"><a href="main.php?act=giohang&idsp='.$idsanpham.'">Thêm Vào Giỏ Hàng</a></button>
                                    </div>
                                    <div class="content__sp-chitiet">
                                        <div style="padding: 10px ; background-color: #223a66; border-top-left-radius: 10px; border-top-right-radius: 10px;"> 
                                        <h4 style ="color: white">Chi Tiết Sản Phẩm: '.$tensanpham.' | Danh Mục: <a style="color:white" href="main.php?act=sanpham&iddanhmuc='.$iddanhmuc.'">'.$tendanhmuc.'</a></h4>
                                        </div>
                                        <ul>
                                            <li>Xuất Xứ: '.$xuatxu.'</li>
                                            <li>Mô Tả: '.$mota.'</li>
                                            <li>Đối Tượng Sử Dụng: '.$doituongsudung.'</li>
                                            <li>Tình Trạng: '.$tinhtrang.'</li>
                                            <li>Hướng Dẫn Sử Dụng: '.$hdsd.'</li>
                                            <li>Giá: '.$gia.' $</li>
                                        </ul>
                                    </div>';
                                }
                            }else{
                                echo '  <div style="text-align: center;">
                                            <p style="font-size: 80px;">ε=┌(;･_･)┘</p>
                                            <p style="font-size: 40px; margin: 80px 0 50px 0">Sản Phẩm Đang Được Tụi Mình Cập Nhật</p>
                                        </div>';
                            }
                        }
                    ?>
                </div>
            </div>
           <!--boxphai--->
           <?php
                include "boxright.php";
           ?>
        </div>
    </div>
        </div>
    <!--camket-->
    <div class="row mrb">
        <div class="slider">
            <div class="container">
                <div style="text-align: center; font-weight: 600; font-size: 25px; color: #223a66; margin-top: 40px;">3 CAM KẾT CỦA NOVENA</div>
                <div class="slider__box">
                    <div class="sliderimg"><img src="https://vivita.vn/wp-content/uploads/2020/11/New-2.png" alt=""></div>
                    <div class="slider__box-text">
                        <h2>Cam kết bán hàng mới</h2>
                        <div class="diver"></div>
                        <p>Novena chỉ bán cho khách hàng các sản phẩm còn mới, đảm bảo chất lượng. Nói không với hàng hết date, cận date.</p>
                    </div>
                </div>

                <div class="slider__box ">
                    <div class="sliderimg"><img src="https://vivita.vn/wp-content/uploads/2020/11/Advisory-1.png" alt=""></div>
                    <div class="slider__box-text">
                        <h2>Cam kết tư vấn đúng</h2>
                        <div class="diver"></div>
                        <p>Chuyên nghiệp và chân thành tư vấn từ tâm, tư vấn đúng vấn đề, đúng hàng, đúng cách dùng.</p>
                    </div>
                </div>
                    

                <div class="slider__box ">
                    <div class="sliderimg"><img src="https://vivita.vn/wp-content/uploads/2020/11/100.png" alt=""></div>
                    <div class="slider__box-text">
                        <h2>Cam kết chính hãng</h2>
                        <div class="diver"></div>
                        <p>Hoàn tiền 200% nếu phát hiện hàng không chính hãng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>