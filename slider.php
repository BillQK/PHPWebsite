
<?php $kq = $t ->TinNoiBat(0,4,$lang); ?>
<div class="caroufredsel_wrapper caroufredsel_wrapper_small_slider">
								<ul class="small_slider id-small_slider">
                                    <?php while($row = $kq -> fetch_assoc()) {?>
									<li class="slide">
										<a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="">
											<img src='<?= $row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
										</a>
										<div class="slider_content_box">
											<ul class="post_details simple">
												<li class="category"><a href="category_health.html" title="<?=$row['TenLT']?>"><?=$row['TenLT']?></a></li>
												<li class="date">
                                                <?=date('d/m/Y',strtotime($row['Ngay']))?>
												</li>
											</ul>
											<h2><a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></h2>
											<p class="clearfix"><?=$row['TomTat']?></p>
										</div>
                                    </li>
                                    <?php }?>
								</ul>
							</div>