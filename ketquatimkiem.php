<?php
$tukhoa = $_GET['tukhoa']; 
$pageSize= PAGEGINATION_PERPAGE; 
if (isset($_GET['pageNum'])) $pageNum = $_GET['pageNum']; 
settype($pageNum,"int"); 
if($pageNum<=0) $pageNum=1; 
$totalRows=0; 
$offset = PAGEGINATION_OFFSET; 
$kq = $t -> TimKiem($tukhoa, $totalRows, $pageNum, $pageSize);

$DemT=0;
?>
<style>
.blog.big .tintrongloai .tieude{font-size:20px}
.blog.big .tintrongloai img {height:200px; width:250px; border:1px solid #aaa}
.blog.big .tintrongloai .post_details{ margin-top:0px; float:right}
.blog.big .tintrongloai .post_content p{margin-top: 0px; padding: 0; text-align:justify; font-size:17px; height: 155px; overflow:hidden;  }
.blog.big .post_content {width:420px; margin-left:10px}
.blog.big .post_details li.date {padding:8px 10px; background:#ddd;}

h1.page_title {font-size:28px; text-transform: uppercase; margin:0 }
.page_header_right {float:none; width:100%}
</style>
<div class="page_header clearfix ">
					<div class="page_header_left">
						<h1 class="page_title">Kết Quả Tìm : <?=$tukhoa?></h1>
					</div>
					<div class="page_header_right">
						<ul class="bread_crumb">
							<li>Số Tin Tìm Được: <?=$totalRows?> Tin </li>
						</ul>
					</div>
				</div>
<ul class="blog big">
    <?php while ($row = $kq ->fetch_assoc()) { ?>
    <li class="post tintrongloai">
        <a  class = "tieude" href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>">
            <img src='<?=$row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
        </a>
        <div class="post_content">
            <h2 class="with_number">
                <a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a>
                <a class="comments_number" href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>#comments_list" title="2 comments"><?=++$DemT?><span class="arrow_comments"></span></a>
            </h2>
            <ul class="post_details">
                <li class="date">
                <?=date('d/m/Y',strtotime($row['Ngay']))?>
                </li>
            </ul>
            <p><?=$row['TomTat']?></p>
        </div>
    </li>
    <?php } ?> 
</ul>

<div class="page_margin+top_section"> &nbsp;</div>
<?php if ($totalRows>$pageSize) {?>
<?php
 $totalPages = ceil($totalRows/$pageSize); 
 $from = $pageNum - $offset; 
 $to = $pageNum + $offset; 
 if ($from <=0) {$from = 1; $to= $offset*2;}
 if ($to > $totalPages) $to = $totalPages; 
 $pagePrev = $pageNum - 1; 
 $pageNext = $pageNum +1; 
 ?>

<ul class="pagination clearfix page_margin_top_section">
    <?php if ($pageNum > 1 ) {?>
    <li>
    <a href="index.php?p=search&tukhoa=<?=$tukhoa?>">Đầu</a>
    </li>
    <li>
    <a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$pageNum?>">Trước</a>
    </li>
    <?php } ?>
     
    <?php 
    for($j = $from; $j < $to; $j++) { ?>
        <?php if ($j!= $pageNum) {?>
        <li>
        <a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$j?>"><?=$j?></a>
        </li>
      <?php   } else { ?>
      <li class="selected">
         <a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$j?>"><?=$j?></a>
      </li> 
    <?php  } ?>
   <?php } ?>
    
    <?php if ($pageNum < $totalPages ) {?>
    <li>
    <a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$pageNext?>">Sau</a>
    </li>
    <li>
    <a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$$totalPages?>">Cuối</a>
    </li>
    <?php } ?>
</ul>
<?php } ?> 

                        