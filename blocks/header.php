<div class="row mrb">
        <div class="header">
            <div class="header__top">
                <div class="container">
                    <div class="header__top-left">
                        <p><i class="fa-solid fa-envelope"></i>Novena@gmail.com</p>
                        <p style="margin-left: 20px;"><i class="fa-solid fa-location-dot"></i>Ninh Kiều, Cần Thơ</p>
                    </div>
                    <style>
                        .cart{
                            margin-right: 30px;
                            color:white;
                            text-decoration: none;
                            position: relative;
                        }
                        .cart:after{
                            content: "";
                            position: absolute;
                            background-color: #e12454;
                            height:2px;
                            width: 0;
                            bottom: -8px;
                            transition: all 0.5s ease;
                            left: 0;
                        }
                        .cart:hover:after{
                            width: 100%;
                        }
                    </style>
                    <div class="header__top-right">
                        <?php if(isset($_SESSION['taikhoan'])){?>
                            <!-- giohangh -->
                            <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/aoggitwj.json"
                                trigger="loop"
                                colors="primary:#ffffff"
                                state="hover"
                                style="width:40px;height:40px;">
                            </lord-icon>
                            <a href="main.php?act=giohang" class="cart">Giỏ Hàng</a>
                        <button class="btnanimation"><a href="main.php?act=logout">Đăng Xuất</a></button>
                        <?php }else{?>
                            <button class="btnanimation"><a href="main.php?act=dangki">Đăng Kí</a></button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="header__menu">
                <div class="container">
                    <div class="header__menu-logo">
                        <a href="main.php"><img src="img/logo.png" alt=""></a>
                    </div>
                    <div class="header__menu-menu">
                        <ul>
                            <li><a href="main.php" style="margin-right: 20px;">Trang Chủ</a></li>
                            <li><a href="" style="margin-right: 20px;">Giới Thiệu</a></li>
                            <li><a href="" >Chính Sách Bảo Hành
                                <ul class="submenu">
                                    <li><a href="">Bảo hành tại chỗ</a></li>
                                    <li><a href="">Bảo hành online</a></li>
                                    <li><a href="">Đổi trả</a></li>
                                </ul>
                            </a></li>
                            <li><a href="" style="margin-left: 20px;">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>