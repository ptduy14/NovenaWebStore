<?php
    ob_start();
    session_start();
    if(isset($_SESSION['taikhoan'])){
        extract($_SESSION['taikhoan']);
    }
    include "../conn.php";
    include "../func.php";
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>
    <?php if($idloaitk == 1){ ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="mainad.php?act=trangchu" class="app-brand-link">
                <img src="../img/logo.png" alt="">
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="mainad.php?act=trangchu" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Trang Chủ</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Danh Mục</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="mainad.php?act=danhmucsp" class="menu-link">
                    <div data-i18n="Without menu">Danh Mục Sản Phẩm</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="mainad.php?act=sanpham" class="menu-link">
                    <div data-i18n="Without navbar">Sản Phẩm</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="mainad.php?act=taikhoan" class="menu-link">
                    <div data-i18n="Container">Tài Khoản</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="mainad.php?act=alldh" class="menu-link">
                    <div data-i18n="Fluid">Tất Cả Đơn Hàng</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- header -->
          <?php 
            include "blocks/header.php";
          ?>
          <!-- endheader -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <?php 
                if(isset($_GET['act'])){
                    $act = $_GET['act'];
                    switch ($act) {
                        case 'trangchu':
                            include "blocks/body.php";
                            break;
                        
                        //controller admin
                        case 'logout':
                            header('location: ../main.php?act=logout');
                            break;
                        
                        //controller danh mục sản phẩm
                        case 'danhmucsp':
                            include "blocks/danhmucsp.php";
                            break;
                        
                        case 'sptheodm':
                            include "blocks/sptheodm.php";
                            break;

                         case 'themdm':
                            include "blocks/themdm.php";
                            break;
                        
                        case 'xoadm':
                            if(isset($_GET['iddanhmuc'])){
                                $iddanhmuc = $_GET['iddanhmuc'];
                                $LaySpThepDm = LaySpThepDm($conn, $iddanhmuc);
                                // kiểm tra ràng buộc trước khi xóa
                                if(mysqli_num_rows($LaySpThepDm) == 0){
                                    $XoaDm = XoaDm($conn, $iddanhmuc);
                                    header('location: mainad.php?act=danhmucsp');
                                }else{
                                ?>    
                                    <script>
                                      window.alert("Đã Có Lỗi, Vui Lòng Thử Lại Sau");
                                    </script>
                                <?php
                                include "blocks/danhmucsp.php";
                                }
                            }
                            break;
                        
                        // controller tài khoản
                        case 'taikhoan':
                            include "blocks/taikhoan.php";
                            break;
                        
                        case 'edittk':
                            include "blocks/edittk.php";
                            break;

                        case 'xoatk':
                            if(isset($_GET['idtaikhoan'])){
                              $idtaikhoan = $_GET['idtaikhoan'];
                              $XoaTk = XoaTk($conn, $idtaikhoan);
                              header('location: mainad.php?act=taikhoan');
                          }
                          break;

                        case 'addtk':
                            include "blocks/addtk.php";
                            break;    

                        // controller sản phẩm
                        case 'sanpham':
                            include "blocks/sanpham.php";
                            break;

                        case 'themsp':
                            include "blocks/themsp.php";
                            break;

                        // controller đơn hàng
                        case'xemdonhang':
                          include "blocks/xemdonhang.php";
                          break;

                        case 'capnhatdonhang':
                          include "blocks/capnhatdonhang.php";
                          break;

                        case 'alldh':
                          include "blocks/alldh.php";
                          break;

                          case 'xoadonhang':
                            if(isset($_GET['iddonhang'])){
                                $iddonhang = $_GET['iddonhang'];
                                $LayDonHangTheoId = LayDonHangTheoId($conn,$iddonhang);
                                $LayDonHangTheoId = mysqli_fetch_array($LayDonHangTheoId);
                                extract($LayDonHangTheoId);
                                if($trangthai == 1){
                                  $XoaCtDh = XoaCtDh($conn, $iddonhang);
                                  $XoaDh = XoaDh($conn, $iddonhang);
                                  ?>    
                                    <script>
                                      window.alert("Xoá Đơn Hàng Thành Công");
                                    </script>
                                  <?php
                                include "blocks/taikhoan.php";
                                }else{
                                  ?>    
                                    <script>
                                      window.alert("Đơn Hàng Chưa Hoàn Thành Không Thể Xóa");
                                    </script>
                                  <?php
                                include "blocks/taikhoan.php";
                                }
                            }
                            break;

                        default:
                            include "blocks/body.php";
                            break;
                    }
                }else{
                    include "blocks/body.php";
                }
            ?>
            <!-- / Content -->
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
  <?php }else{ echo 'Bạn không có quyền vào trang này';} ?>
</html>
<?php
    ob_end_flush();
?>
