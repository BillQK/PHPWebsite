<?php
$tenLT = $t -> LayTenLoaiTin($idLT);
$kq = $t -> TinMoiTrong1Loai($idLT, 0,1,$lang); 
$row = $kq ->fetch_assoc();
?> 
<style>
.tinmoinhattrongloai{margin:0!important}
.tinmoinhattrongloai img {height:180px; width : 330px}
.tinmoitieptheo { margin:0; white-space:nowrap; margin-bottom:20px}
</style>

<h4 class="box_header"><?=$tenLT?></h4>
							<ul class="blog small_margin clearfix">
								<li class="post tinmoinhattrongloai">
									<a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>">
										<img src='<?=$row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
									</a>
									<div class="post_content">
										<h5>
											<a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a>
										</h5>
										<ul class="post_details simple">
											<li class="date">
                                            <?=date('d/m/Y',strtotime($row['Ngay']))?>	
											</li>
										</ul>
									</div>
								</li>
                            </ul>
                            <?php $kq = $t -> TinMoiTrong1Loai($idLT, 1, 5, $lang); ?>
							<ul class="list tinmoitieptheo">
                            <?php while($row = $kq -> fetch_assoc()) {?>
								<li class="bullet style_1"><a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></li>
							<?php } ?> 
							</ul>