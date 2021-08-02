<?php 
session_start(); 
require_once "../class/quantritin.php";
$qt = new quantritin;
$idLT=$_GET['idLT'];
settype($idLt,"int");
$kiemtra = $qt->Tin_KiemTra($idLT); 
    if(mysqli_num_rows($kiemtra) > 0){
        header("location:index.php?p=loaitin_ds");
    }
    else {
        $kq= $qt->LoaiTin_Xoa($idLT);
        header("location:index.php?p=loaitin_ds");
    }

?>
