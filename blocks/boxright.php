<div class="boxphai">
                <div class="row mrb">
                    <?php if(isset($_SESSION['taikhoan'])){ extract($_SESSION['taikhoan'])?>
                    <div class="boxtitle">
                        Tài Khoản
                    </div>
                    <div class="boxcontent">
                        <style>
                            .boxcontent > div > a{
                                text-decoration: none;
                                position: relative;
                            }
                            .boxcontent > div > a:hover{
                                color:#e12454;
                            }
                            .boxcontent > div > a:after{
                                content: "";
                                position: absolute;
                                background-color: #e12454;
                                height:3px;
                                width: 0;
                                bottom: -5px;
                                transition: all 0.5s ease;
                                left: 0;
                            }
                            .boxcontent > div > a:hover:after{
                                width: 100%;
                                bottom: -10px;
                            }
                        </style>
                       <h4 style="color: #738ba4; margin-left:10px; line-height:2">xin chào <?=$hoten ?> <br>٩(＾◡＾)۶</h4>
                       <div style="margin: 10px 0 20px 0"><a href="main.php?act=update_acc" style = "margin-left: 10px; ">Cập Nhật Tài Khoản</a></div>
                       <div style="margin: 10px 0 20px 0"><a href="main.php?act=donhang" style = "margin-left: 10px; ">Đơn Hàng Của Bạn</a></div>
                    </div>
                    <?php 
                    } else {
                    ?>
                    <div class="boxtitle">
                        Đăng Nhập
                    </div>
                    <div class="boxcontent">
                        <?php 
                        ?>
                        <form action="main.php?act=dangnhap" method="POST" >
                            <input type="text" placeholder="Tên Đăng Nhập" name="username"> <br>
                            <span style="color:red"><?php echo (isset($err['username']))?$err['username']:''?></span>
                            <input type="password" placeholder="Mật Khẩu" name="pass"> <br>
                            <span style="color:red"><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                            <span style="color:red"><?php echo (isset($thongbao))?$thongbao:''?></span>
                            <button type="submit" class="btnanimation" name="dangnhap">Đăng Nhập</button> <br>
                            <div style = "margin: 10px 0"><a href="main.php?act=quenmk">Quên mật khẩu</a></div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
                <div class="row mrb">
                    <div class="boxtitle">
                        Danh Mục Sản Phẩm
                    </div>
                    <div class="boxcontent2">
                        <ul>
                            <?php 
                                $DanhMucSp = LayDanhMucSp($conn);
                                foreach ($DanhMucSp as $dm) {
                                    extract($dm);
                                    echo '<li><a href="main.php?act=sanpham&iddanhmuc='.$iddanhmuc.'">'.$tendanhmuc.'</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="boxfooter">
                        <form action="main.php?act=timkiem" method="GET">
                            <input type="text" placeholder="Tìm kiếm sản phẩm..." name = "timkiem"> <br>
                            <button type="submit" class="btnanimation">Tìm Kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="row mrb">
                    <div class="boxtitle"></div>
                    <div class="boxcontent"></div>
                </div>
            </div>