<?php 
$kq = $t ->TinNgauNhien(3,$lang);
?> 
<style>
    .tinngaunhien{
        margin-bottom:20px; 
    }
    .tinngaunhien img{
        width:90px!important; 
        height:80px!important; 
        border:1px solid #aaa; 
    }
    .tinngaunhien .post_content h5 a { 
        margin-bottom: 5px; 
    }
</style>
<ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
<?php while ($row = $kq -> fetch_assoc()){?>
<li class="post tinngaunhien">
    <a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>">
        <span class="icon small gallery"></span>
        <img src='<?=$row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
    </a>
    <div class="post_content">
        <h5>
            <a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TenTL']?>"><?=$row['TenTL']?></a>
        </h5>
        <ul class="post_details simple">
            <li class="category"><a href="category_health.html" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></li>
            <li class="date">
            <?=date('d/m/Y',strtotime($row['Ngay']))?>	
            </li>
        </ul>
    </div>
</li>
<?php } ?>
</ul>

