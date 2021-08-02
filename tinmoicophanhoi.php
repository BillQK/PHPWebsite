<?php
 $kq = $t -> TinMoiCoPhanHoi(0,10,$lang); 
$demTMPH= 0;
?>
<style>
    .tinmoicophanhoi a img { 
        height:170px; 
        border:1px solid #aaa; 
    }
    .tinmoicophanhoi h5{ 
        height:45px;
        overflow:hidden; 
        font-size:17px; 
    }
</style>

<div id="most-commented">
    <div class="horizontal_carousel_container page_margin_top">
        <ul class="blog horizontal_carousel page_margin_top autoplay-0 visible-4 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
            <?php while($row = $kq -> fetch_assoc()) {?>
            <li class="post tinmoicophanhoi">
                <a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>">
                    <img src='<?=$row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
                </a>
                <h5><span class="number"><?=++$demTMPH?></span><a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></h5>
                <ul class="post_details simple">
                    <li class="category"><a href="category_health.html" title="<?=$row['TenLT']?>"><?=$row['TenLT']?></a></li>
                    <li class="date">
                    <?=date( 'd/m/Y', strtotime($row['Ngay']) )?> 
                    </li>
                </ul>
            </li>
          <?php } ?> 
         </ul>
    </div>
</div>


