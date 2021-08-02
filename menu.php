
<style>
.sf-menu li a {font-size:16px;}
</style>
<div class="menu_container style_3 clearfix">
    <nav>
    <ul class="sf-menu">
        <li class="selected">
            <a href="index.php" title="Trang chủ">
            Trang chủ
            </a>
        </li>
        <?php $kq = $t->ListTheLoai($lang);	?>
        <?php while ($rowTL = $kq->fetch_assoc() ) {?>
        <li class="submenu">
            <a href="#" title="<?=$rowTL['TenTL']?>">
            <?=$rowTL['TenTL']?>
            </a>
            <ul>
                <?php $kq1 = $t->ListLoaiTinTrong1TheLoai($rowTL['idTL']);?>
                <?php while ($rowLT = $kq1->fetch_assoc() ) {?>
                <li>
                    <a href="index.php?p=cat&idLT=<?=$rowLT['idLT']?>" title="<?=$rowLT['Ten']?>">
                    <?=$rowLT['Ten']?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?> 
    </ul>
    </nav>