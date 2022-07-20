<div class="row ">
        <div class="container">
        <div class="row">
            <div class="boxtrai">
                <!--slidershow-->
                <?php
                    include "slidershow.php";
                ?>
                <!--sanpham-->
                <div class="row">
                    <?php
                        if(isset($_GET['timkiem'])){
                            $timkiem = $_GET['timkiem'];
                            $TimKiemSp = TimKiemSp($conn, $timkiem);
                            echo '<div class="row mrb" style="background-color: #223a66; padding: 10px; color:white">
                            Từ khóa bạn tìm: '.$timkiem.'
                            </div>';
                            if(mysqli_num_rows($TimKiemSp) > 0){
                                foreach ($TimKiemSp as $sp) {
                                    extract($sp);
                                    echo '  <div class="boxsp">
                                            <div class="img row">
												<img src="img/sanpham/'.$hinhanh.'" alt="">
                                                <a href="main.php?act=giohang&idsp='.$idsanpham.'" class="buynow">Thêm Vào Giỏ Hàng</a>
											</div>
                                            <p>'.$tensanpham.'</p>
                                            <p>$'.$gia.'</p>
                                            <button class="btnanimation"><a href="main.php?act=chitietsp&idsanpham='.$idsanpham.'">Xem Chi Tiết Sản Phẩm</a></button>
                                            </div>';
                                }   
                            }else{      
                                echo '  <div class="row">
                                            <div class="error">
                                                <img style="width: 100%" src="img/404.png";>
                                            </div>
                                        </div>';}
                        }else{
                            $AllSp =  LayAllSp($conn);
                            foreach ($AllSp as $sp) {
                                extract($sp);
                                echo '  <div class="boxsp">
                                        <div class="img row">
											<img src="img/sanpham/'.$hinhanh.'" alt="">
                                            <a href="main.php?act=giohang&idsp='.$idsanpham.'" class="buynow">Thêm Vào Giỏ Hàng</a>
										</div>
                                        <p>'.$tensanpham.'</p>
                                        <p>$'.$gia.'</p> 
                                        <button class="btnanimation"><a href="main.php?act=chitietsp&idsanpham='.$idsanpham.'">Xem Chi Tiết Sản Phẩm</a></button>
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