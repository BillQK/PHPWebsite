<style>
.hinhtinnoibattt {
	height:160px;
}
.tieudetinnoibattt{
	height:45px; 
	overflow:hidden;
}
</style>
<?php $kq = $t -> TinNoiBat(4,6,$lang); ?> 
<ul class="blog medium">
    <?php while ($row = $kq -> fetch_assoc()){?>
    <li class="post">
		<a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="High Altitudes May Aid Weight Control">
            <span class="icon gallery"></span>
            <img class="hinhtinnoibattt" src=' <?= $row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
		</a>
	    <h5 class="tieudetinnoibattt"><a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></h5>
		<ul class="post_details simple">
		    <li class="category"><a href="category_health.html" title="<?=$row['TenLT']?>"><?=$row['TenLT']?></a></li>
		    <li class="date">
            <?=date('d/m/Y',strtotime($row['Ngay']))?>
		    </li>
		</ul>
	</li>
	<?php } ?>							
</ul>