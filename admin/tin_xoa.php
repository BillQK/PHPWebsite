<?php 
require_once "../class/quantritin.php";
$qt = new quantritin; 
$idTin = $_GET['idTin']; settype($idTin, 'int'); 
$kiemtra = $qt->ykien_KiemTra($idTin);
if (mysqli_num_rows($kiemtra)){
    header("location:index.php?p=tin_ds"); 
} 
else {
    $kq = $qt ->Tin_Xoa($idTin); 
    header("location:index.php?p=tin_ds");
}