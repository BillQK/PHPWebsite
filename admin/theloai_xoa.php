<?php 
session_start(); 
require_once "../class/quantritin.php";
$qt = new quantritin;
    $idTL=$_GET['idTL'];
    settype($idTL,"int");
    $kiemtra = $qt->TheLoai_KiemTra($idTL); 
        if(mysqli_num_rows($kiemtra) > 0){
            header("location:index.php?p=theloai_ds");
        }
        else {
            $kq= $qt->TheLoai_Xoa($idTL);
            header("location:index.php?p=theloai_ds");
        }

?>
