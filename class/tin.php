<?php 
require_once "class/goc.php"; 
class tin extends goc{
    function TinNoiBat($from, $sotin, $lang ){
        $TieuDe_KhongDau = trim(strip_tags($TieuDe_KhongDau)); 
        $TieuDe_KhongDau = $this->db->escape_string($TieuDe_KhongDau); 
        $sql = "SELECT TieuDe_KhongDau, idTin, TieuDe, Ngay, TomTat, urlHinh, loaitin.Ten as TenLT 
        FROM tin,loaitin 
        WHERE tin.idLT = loaitin.idLT AND tin.AnHien = 1 AND TinNoiBat = 1 AND tin.lang = '$lang' 
        ORDER BY idTin DESC LIMIT $from, $sotin"; 
        $kq = $this->db->query($sql);
        if (!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq; 
    }
    function TinMoi($from, $sotin, $lang){
        $sql = "SELECT TieuDe_KhongDau, idTin, TieuDe, Ngay, TomTat, urlHinh, loaitin.Ten as TenLT 
                FROM tin,loaitin 
                WHERE tin.idLT = loaitin.idLT AND tin.AnHien = 1 AND tin.lang = '$lang'
                ORDER BY idTin DESC LIMIT $from, $sotin"; 
        $kq = $this->db->query($sql);
        if (!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq; 
    }
    function TinMoiTrong1Loai($idLT, $from, $sotin, $lang) {
        $sql = "SELECT TieuDe_KhongDau, idTin,TieuDe,Ngay,TomTat,urlHinh
        FROM tin WHERE idLT=$idLT AND AnHien=1 and lang='$lang'
        ORDER BY idTin DESC LIMIT $from, $sotin"; 
        $kq = $this->db->query($sql); 
        if (!$kq) die ("Lỗi Trong Hàm".__FUNCTIOn__.$this->db->error); 
        return $kq; 
        
    }
    function LayTenLoaiTin($idLT){
        $sql = "SELECT Ten 
        FROM loaitin WHERE idLT=$idLT";
        $kq = $this->db->query($sql); 
        if (!$kq) die("Lỗi Trong Hàm".__FUNCTIOn__.$this->db->error); 
        if ($kq->num_rows<=0) return "";
        $row = $kq -> fetch_row(); 
        $ten=$row[0]; 
        return $ten;
        
    }
    function TinNgauNhien($sotin, $lang) {
        $sql = "SELECT  TieuDe_KhongDau,idTin, TieuDe, Ngay, TomTat, urlHinh, loaitin.Ten as TenTL 
        FROM tin, loaitin 
        WHERE tin.idLT= loaitin.idLT AND tin.AnHien=1 and tin.lang='$lang'
        ORDER BY rand() LIMIT 0, $sotin"; 
        $kq = $this->db->query($sql); 
        if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq; 
     }
     function ListLoaiTin($lang) {
         $sql = "SELECT idLT, Ten as TenTL FROM loaitin WHERE lang='$lang' AND AnHien = 1 ORDER BY ThuTu"; 
        $kq = $this->db->query($sql); 
        if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq; 
     }
     function ListTags($lang) {
         $sql = "SELECT idTag, TenTag FROM tags WHERE lang='$lang' AND AnHien = 1 ORDER BY ThuTu";
         $kq = $this->db->query($sql);
         if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq; 
     }
     function TinXemNhieu($from, $sotin, $lang) {
         $sql = "SELECT TieuDe_KhongDau, idTin, TieuDe, Ngay, TomTat, urlHinh, loaitin.Ten as TenLT FROM tin, loaitin
         WHERE tin.idLT = loaitin.idLT AND tin.AnHien =1 and tin.lang = '$lang' ORDER By SoLanXem DESC LIMIT $from, $sotin"; 
         $kq = $this->db->query($sql);
        if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
         return $kq; 
     }
     function TinMoiCoPhanHoi($from, $sotin, $lang) {
         $sql = "SELECT TieuDe_KhongDau, idTin, TieuDe, Ngay, TomTat, urlHinh, loaitin.Ten as TenLT 
         FROM tin,loaitin 
         WHERE tin.idLT = loaitin.idLT AND tin.AnHien = 1 and tin.lang='$lang' 
         AND idTin in (
             SELECT DISTINCT idTin FROM ykien ORDER BY Ngay DESC 
        )
         ORDER BY idTin ASC LIMIT $from, $sotin"; 
         $kq = $this->db->query($sql); 
         if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
         return $kq; 
     }
     function ListTheLoai($lang) {
         $sql= "SELECT idTL, TenTL FROM theloai WHERE lang='$lang' AND AnHien=1 ORDER BY ThuTu";
         $kq = $this->db->query($sql); 
         if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
         return $kq;
     }
     function ListLoaiTinTrong1TheLoai($idTL) {
        $sql= "SELECT idLT, Ten FROM loaitin WHERE idTL=$idTL AND AnHien=1 ORDER BY ThuTu";
        $kq = $this->db->query($sql); 
        if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq;
     }
     function TinMoiNhat($sotin, $lang) {
        $sql= "SELECT TieuDe_KhongDau, idTin,TieuDe,Ngay FROM tin WHERE idTL=22 AND lang='$lang' LIMIT 0, $sotin"; 
        $kq = $this->db->query($sql); 
        if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq;
     }
     function ChiTietTin($idTin){
         settype($idTin,"int");
         $sql= "SELECT TieuDe_KhongDau, idTin, TieuDe, Ngay, TomTat, urlHinh, Content, SoLanXem, tin.idLT, Ten, tin.idTL, TenTL 
         FROM tin, loaitin, theloai 
         WHERE tin.idLT = loaitin.idLT AND loaitin.idTL = theloai.idTL AND idTin = $idTin"; 
         $kq = $this->db->query($sql); 
         if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
         if($kq->num_rows<=0) return FALSE; 
         return $kq -> fetch_assoc();
     }
     function CapNhatSoLanXemTin($idTin) {
         settype($idTin, 'int');
         $sql= "UPDATE tin SET SoLanXem= SoLanXem+1 WHERE idTin = $idTin"; 
         $this->db->query($sql); 
     }
     function TinCuCungLoai($idTin, $lang, $sotin = 5){
         $sql="SELECT TieuDe_KhongDau,idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem 
         FROM tin 
         WHERE AnHien = 1 AND idTin<$idTin AND lang = '$lang' 
         AND idLT = (SELECT idLT FROM tin WHERE idTin = $idTin)
         ORDER BY idTin DESC LIMIT 0, $sotin"; 
         $kq = $this->db->query($sql); 
         if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
         return $kq;
     }
    function LuuYKien($idTin, $noidung, $hoten, $email, &$loi) {
        $loi=""; 
        settype($idTin, "int");
        $hoten = $this->db->escape_string(trim(strip_tags($hoten))); 
        $email = $this->db->escape_string(trim(strip_tags($email))); 
        $noidung = $this->db->escape_string(trim(strip_tags($noidung))); 
        if ($hoten=="") $loi.="Bạn chưa nhập họ tên <br> " ;  
        if ($email=="") $loi.="Bạn chưa nhập email <br> " ;
        if ($noidung=="") $loi.="Bạn chưa nhập nội dung ý kiến <br> " ; 
        if (strlen($hoten) < 10) $loi.="Nội dung ý kiến quá ngắn <br> " ;  
        if ($loi=="") return FALSE;     

        $sql = "INSERT INTO ykien (idTin, HoTen, Email, NoiDung, Ngay) VALUES ($idTin, 'x$hoten', '$email', '$noidung', NOW())";
        $kq = $this->db->query($sql); 
        if(!$kq) die("Lỗi Trong Hàm".__FUNCTION__.$this->db->error); 
        return $kq;
    }
    function LayCacYKienCua1Tin($idTin){
        $sql = "SELECT idYKien, HoTen, NoiDung, Ngay FROM ykien WHERE AnHien = 1 AND idTin = $idTin 
        ORDER BY Ngay DESC"; 
        $kq = $this->db->query($sql); 
        if(!$kq) die($this->db->error); 
        return $kq;
    }
    function TinTrongLoai($idLT, $pageNum, $pageSize, &$totalRows) {
        $startRow = ($pageNum-1)*$pageSize; 
        $sql= "SELECT TieuDe_KhongDau, idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem FROM tin WHERE AnHien = 1 AND idLT=$idLT ORDER BY idTin DESC LIMIT $startRow, $pageSize"; 
        $kq = $this->db->query($sql); 
        if(!$kq) die($this->db->error); 

        $sql = "SELECT count(*) FROM tin WHERE idLT= $idLT AND AnHien = 1";
        $rs = $this->db->query($sql); 
        $row_rs = $rs -> fetch_row(); 
        $totalRows = $row_rs[0];
        if(!$kq) die($this->db->error);
        return $kq; 
    }
    function TimKiem($tukhoa, &$totalRows, $pageNum=1, $pageSize=5) {
        $startRow=($pageNum-1) * $pageSize;
        $tukhoa =$this->db->escape_string(trim(strip_tags($tukhoa)));
        $sql = "SELECT TieuDe_KhongDau, idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, Ten, TenTL 
        FROM tin, loaitin, theloai 
        WHERE tin.AnHien=1 AND tin.idLT =loaitin.idLT and tin.idTL=theloai.idTL 
        And (TieuDe RegExp '$tukhoa' or TomTat RegExp '$tukhoa')
        ORDER BY idTin DESC LIMIT $startRow, $pageSize"; 
        $kq=$this->db->query($sql);
        if (!$kq) die ('Lỗi trong hàm'.__FUNCTION__.''.$this->db->error);

        $sql ="SELECT count(*) from tin, loaitin, theloai where tin.AnHien =1 And tin.idLT =loaitin.idLT and tin.idTL =theloai.idTL 
        And (TieuDe RegExp '$tukhoa' or TomTat RegExp '$tukhoa') ";
        $rs =$this->db->query($sql);
        if (!$kq) die ('Lỗi trong hàm'.__FUNCTION__.''.$this->db->error);
        $row_rs =$rs->fetch_row();
        $totalRows =$row_rs[0];
        return $kq;
    }
    function getTitle($p='') {
        if ($p=='') return "Tin tức tổng hợp" ;
        elseif ($p=='search') return "Tìm kiếm tin";
        elseif ($p=='detail') {
            $TieuDe_KhongDau = trim(strip_tags($_GET['TieuDe_KhongDau'])); 
            $TieuDe_KhongDau = $this->db->escape_string($TieuDe_KhongDau);
            $kq = $this->db->query("SELECT TieuDe FROM tin WHERE TieuDe_KhongDau= '$TieuDe_KhongDau'");
            $id =$_GET['idTin'];
            settype($id,"int");
            $kq = $this->db->query("select TieuDe from tin where idTin=$id");
            if (!$kq) die ($this->db->error);
            if ($kq->num_rows<=0) return " Tin tức tổng hợp ";
            $row_kq = $kq->fetch_row();
            return $row_kq[0];
        }
        elseif ($p=="cat") {
            $id =$_GET['idLT'];
            settype($id,"int");
            $tenTL=$this->LayTenLoaiTin($id);
            if ($tenLT=="") return "Tin tức tổng hợp";
            else  return $tenLT ;
        }

    }
    function LayidTin($TieuDe_KhongDau) {
        $TieuDe_KhongDau = trim(strip_tags($TieuDe_KhongDau)); 
        $TieuDe_KhongDau = $this->db->escape_string($TieuDe_KhongDau); 
        $sql = "SELECT idTin FROM tin WHERE TieuDe_KhongDau = '$TieuDe_KhongDau'"; 
        $kq = $this->db->query($sql); 
        $row_kq = $kq -> fetch_assoc(); 
        return $row_kq['idTin'];
    }
    
     }