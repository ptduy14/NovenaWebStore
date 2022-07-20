<?php
    // func danh mục
    function LayDanhMucSp($conn){
        $sql = "SELECT * FROM danhmucsp";
        return mysqli_query($conn, $sql);
    }

    function LaySpThepDm($conn, $iddanhmuc){
        $sql = "SELECT * 
                FROM sanpham, danhmucsp 
                WHERE sanpham.iddanhmuc = danhmucsp.iddanhmuc 
                AND danhmucsp.iddanhmuc = $iddanhmuc";
        return mysqli_query($conn, $sql);
    }

    function ThemDanhMuc($conn,$tendanhmuc){
        $sql = "INSERT INTO `danhmucsp` (`iddanhmuc`, `tendanhmuc`) 
                VALUES (NULL, '$tendanhmuc')";
        return mysqli_query($conn, $sql);     
    }

    function LaySpvaDm($conn){
        $sql = "SELECT * FROM sanpham, danhmucsp WHERE sanpham.iddanhmuc = danhmucsp.iddanhmuc";
        return mysqli_query($conn, $sql);
    }

    function XoaDm($conn, $iddanhmuc){
        $sql = "DELETE FROM danhmucsp WHERE iddanhmuc = $iddanhmuc";
        return mysqli_query($conn, $sql);
    }
    // end func danh mục

    // func sản phẩm
    function LayAllSp($conn){
        $sql = "SELECT * FROM sanpham";
        return mysqli_query($conn, $sql);
    }

    function LaySp($conn, $idsanpham){
        $sql = "SELECT * 
                FROM sanpham 
                WHERE idsanpham = $idsanpham";
         return mysqli_query($conn, $sql);
    }

    function TimKiemSp($conn, $timkiem){
        $sql = "SELECT * 
                FROM sanpham 
                WHERE tensanpham 
                LIKE '%$timkiem%'";
        return mysqli_query($conn, $sql);
    }

    function LayChitietSp($conn, $idsanpham){
        $sql = "SELECT *
            FROM sanpham, chitietsp, danhmucsp 
            WHERE sanpham.idsanpham = chitietsp.idsanpham
            AND sanpham.iddanhmuc = danhmucsp.iddanhmuc
            AND sanpham.idsanpham = $idsanpham";
        return mysqli_query($conn, $sql);
    }

    function ThemSp($conn,$tensanpham,$gia,$iddanhmuc,$ten_hinhanh){
        $sql = "INSERT INTO `sanpham` (`idsanpham`, `tensanpham`, `gia`, `hinhanh`, `iddanhmuc`) 
                VALUES (NULL, '$tensanpham', $gia, '$ten_hinhanh', $iddanhmuc)";
        return mysqli_query($conn, $sql);
    }
    // end

    // func tài khoản
    function DangKiTaiKhoan($conn,$hoten,$gioitinh,$diachi,$sdt,$username,$pass){
        $sql = "INSERT INTO `taikhoan` (`hoten`, `gioitinh`, `diachi`, `sdt`, `username`,`pass`) 
                VALUES ('$hoten', '$gioitinh', '$diachi', $sdt, '$username', '$pass')";
        return mysqli_query($conn, $sql);
    }

    function LayTaiKhoan($conn){
        $sql = "SELECT * FROM taikhoan, loaitaikhoan WHERE loaitaikhoan.idloaitk = taikhoan.idloaitk";
        return mysqli_query($conn, $sql);
    }

    function DangNhapTaiKhoan($conn,$username,$pass){
        $sql = "SELECT * 
                FROM taikhoan 
                WHERE username = '$username'
                AND pass = '$pass'";
       return mysqli_query($conn, $sql);
    }

    function UpdateTaiKhoan($conn,$hoten,$gioitinh,$diachi,$sdt,$username,$idtaikhoan){
        $sql = "UPDATE taikhoan 
                SET hoten = '$hoten', gioitinh = '$gioitinh', diachi = '$diachi', sdt = $sdt, username = '$username' 
                WHERE idtaikhoan = $idtaikhoan";
        return mysqli_query($conn, $sql);
    }

    function LaySdt_Username($conn, $sdt, $username){
        $sql = "SELECT * 
                FROM taikhoan 
                WHERE sdt = $sdt
                AND username = '$username'";
       return mysqli_query($conn, $sql);
    }

    function LayTkTheoId($conn, $idtaikhoan){
        $sql = "SELECT * FROM taikhoan WHERE idtaikhoan = $idtaikhoan";
        return mysqli_query($conn, $sql);
    }

    function LayLoaitk($conn){
        $sql = "SELECT * FROM loaitaikhoan";
        return mysqli_query($conn, $sql);
    }

    function EditTkAdmin($conn,$hoten,$gioitinh,$diachi,$sdt,$idtaikhoan,$idloaitk){
        $sql = "UPDATE taikhoan 
                SET hoten = '$hoten', gioitinh = '$gioitinh', diachi = '$diachi', sdt = $sdt, idloaitk = $idloaitk
                WHERE idtaikhoan = $idtaikhoan";
        return mysqli_query($conn, $sql);
    }

    function XoaTk($conn, $idtaikhoan){
        $sql = "DELETE FROM taikhoan WHERE idtaikhoan = $idtaikhoan";
        return mysqli_query($conn, $sql);
    }

    // end

    // func đơn hàng
    function DatHang($conn, $nguoinhan, $diachi, $sdt, $ghichu, $idtaikhoan){
        $sql = "INSERT INTO `dondathang` (`iddonhang`, `ngaydathang`, `diachi`, `nguoinhan`, `sdt`, `ghichu`, `idtaikhoan`) 
                VALUES (NULL, current_timestamp(), '$diachi', '$nguoinhan', $sdt, '$ghichu', $idtaikhoan)";
        return mysqli_query($conn, $sql);
    }

    function LayIdDonHang($conn, $idtaikhoan){
        $sql = "SELECT iddonhang
                FROM dondathang
                WHERE idtaikhoan = $idtaikhoan
                AND iddonhang NOT IN (SELECT iddonhang FROM ctdonhang)
                ORDER BY iddonhang DESC";
        return mysqli_query($conn, $sql);
    }

    function LayDonHang($conn, $idtaikhoan){
        $sql = "SELECT * 
                FROM ctdonhang, dondathang, sanpham 
                WHERE ctdonhang.iddonhang = dondathang.iddonhang
                AND sanpham.idsanpham = ctdonhang.idsanpham
                AND dondathang.idtaikhoan = $idtaikhoan";
        return mysqli_query($conn, $sql);        
    }

    function LayDonHangTheoId($conn,$iddonhang){
        $sql = "SELECT * FROM dondathang WHERE iddonhang=$iddonhang";
        return mysqli_query($conn, $sql);  
    }
    
    function CapNhatDonHang($conn,$iddonhang, $trangthai){
        $sql = "UPDATE `dondathang` SET `trangthai` = b'$trangthai' WHERE `dondathang`.`iddonhang` = $iddonhang";
        return mysqli_query($conn, $sql);  
    }

    function XoaCtDh($conn, $iddonhang){
        $sql = "DELETE FROM ctdonhang WHERE iddonhang = $iddonhang";
        return mysqli_query($conn, $sql);
    }

    function XoaDh($conn, $iddonhang){
        $sql = "DELETE FROM dondathang WHERE iddonhang = $iddonhang";
        return mysqli_query($conn, $sql);
    }
    
    function LayAllDh($conn){
        $sql = "SELECT * FROM `dondathang`";
        return mysqli_query($conn, $sql);
    }
?>