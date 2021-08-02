<?php 
    require_once "../class/quantritin.php";
    $qt = new quantritin; 
?>


<div class="container-fluid">

            <!-- Basic Examples -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                QUẢN TRỊ LOẠI TIN 
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>idLT</th>
                                            <th>Tên</th>
                                            <th>Thứ Tự</th>
                                            <th>Ẩn Hiện</th>
                                            <th>Ten_KhongDau</th>
                                            <th>Trong Thể Loại</th>
                                            <th>Ngôn Ngữ</th>
                                            <th>Chỉnh/Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $kq = $qt->ListLoaiTin(); ?>
                                        <?php while($rowLT = $kq->fetch_assoc()){?> 

                                        <tr>
                                            <td><?=$rowLT['idLT']?></td>
                                            <td><?=$rowLT['Ten']?></td>
                                            <td><?=$rowLT['ThuTu']?></td>
                                            <td><?=($rowLT['AnHien']==1)?"Đang Hiện":"Đang Ẩn"?></td>
                                            <td><?=$rowLT['Ten_KhongDau']?></td>
                                            <td><?=$rowLT['TenTL']?></td>
                                            <td><?=$rowLT['lang']?></td>
                                            <td>
                                            <a href="?p=loaitin_sua&idLT=<?=$rowLT['idLT']?>" class="btn bg-blue waves-effect">Cập Nhật <a> &nbsp;
                                            <a href="loaitin_xoa.php?idLT=<?=$rowLT['idLT']?>" class="btn bg-red waves-effect" onClick ="return confirm('Xoá hả')"> Xoá <a>
                                            </td>
                                        </tr>
                                        <?php }?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/pages/tables/jquery-datatable.js"></script>

</div>