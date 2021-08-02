<style>
.tinmoinhat a img{ 
	height: 200px; 
	border: 1px solid #aaa; 
}
.tinmoinhat .with_number a {
	height: 48px; 
	overflow:hidden; 
	font-size:20px; 
	line-height: 24px; 
}
.tinmoinhat .post_details {
	margin-top:0; 
	text-transform:uppercase; 
}
.tinmoinhat .post_details+p{
	height:65px; 
	padding: 0; 
	font-size:16px; 
	overflow:hidden; 
	text-align:justify; 
}
.tinmoinhat a.comment_number{ 
	padding-bottom:0; 
	height: 38px; 
}
.tinmoinhat h2 {
	margin-top:5px; 
}
</style>

    <?php while ($row = $kq -> fetch_assoc()) {?>
	<li class="post tinmoinhat">
		<a href="p=detail&idTin=<?=$row['idTin']?>" title="">
			<img src='<?=$row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
		</a>
		<h2 class="with_number">
			<a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a>
			<a class="comments_number" href="p=detail&idTin=<?=$row['idTin']?>" title="2 comments">2<span class="arrow_comments"></span></a>
		</h2>
		<ul class="post_details">
			<li class="category"><a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau']?>" title="<?=$row['TenLT']?>"><?=$row['TenLT']?></a></li>
			<li class="date">
				<?=date('d/m/Y', strtotime($row['Ngay']))?>
			</li>
		</ul>
		<p><?=$row['TomTat']?></p>
    </li>
	<?php } ?> 							

