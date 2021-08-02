<?php 
if(isset($_GET['idTin'])){
    $idTin = $_GET['idTin'];
    $idTin = $t -> LayidTin($idTin);
    $row = $t->ChiTietTin($idTin); 
    $t->CapNhatSoLanXemTin($idTin);
}
?> 

<style>
.post.single .noidungtin .content_box{
    width:100%; 
    margin-right:20px; 
    margin-left:0; 
    margin-top:20px; 
}
h1.post_title {font-size:32px; margin-right:20px; margin-left: 0px   }
.post.single h3.excerpt{font-size:20px; letter-spacing:1px; text-align:justify}
.post.single .text{
    font-size:20px; 
    text-align:justify;
}
.tintieptheo a img {
    height: 150px; 
}
fieldset.column {
    margin:0; width:50%; 
}
#comment_form fieldset:nth-child(3) { text-align:right}
#thongbaoYK { padding:15px; background : #aaa; text-align:center;  line-height:200%; font-size:20px }
</style>
<div class="column column_2_3">
    <div class="row">
        <div class="post single">
            <h1 class="post_title">
               <?=$row['TieuDe']?>
            </h1>
            <ul class="post_details clearfix">
                <li class="detail category"> <a href="category_health.html" title="<?=$row['Ten']?>"><?=$row['Ten']?></a></li>
                <li class="detail date"><?=date('d/m/Y', strtotime($row['Ngay']))?></li>
                <li class="detail views"><?=$row['SoLanXem']?> Lần Xem</li>
            </ul>
            <div class="post_content noidungtin clearfix">
                <div class="content_box">
                    <h3 class="excerpt"><?=$row['TomTat']?></h3>
                    <div class="text">
                        <?=$row['Content']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row page_margin_top">
        <div class="share_box clearfix">
            <label>Share:</label>
            <ul class="social_icons clearfix">
                <li>
                    <a target="_blank" title="" href="http://facebook.com/QuanticaLabs" class="social_icon facebook">
                        &nbsp;
                    </a>
                </li>
                <li>
                    <a target="_blank" title="" href="https://twitter.com/QuanticaLabs" class="social_icon twitter">
                        &nbsp;
                    </a>
                </li>
                <li>
                    <a title="" href="mailto:contact@pressroom.com" class="social_icon mail">
                        &nbsp;
                    </a>
                </li>
                <li>
                    <a title="" href="#" class="social_icon skype">
                        &nbsp;
                    </a>
                </li>
                <li>
                    <a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon envato">
                        &nbsp;
                    </a>
                </li>
                <li>
                    <a title="" href="#" class="social_icon instagram">
                        &nbsp;
                    </a>
                </li>
                <li>
                    <a title="" href="#" class="social_icon pinterest">
                        &nbsp;
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row page_margin_top">
        <ul class="taxonomies tags left clearfix">
            <li>
                <a href="#" title="People">PEOPLE</a>
            </li>
            <li>
                <a href="#" title="Sport">SPORT</a>
            </li>
        </ul>
        <ul class="taxonomies categories right clearfix">
            <li>
                <a href="category_health.html" title="HEALTH">HEALTH</a>
            </li>
        </ul>
    </div>
    <div class="row page_margin_top_section">
        <h4 class="box_header">Tin Tiếp Theo</h4>
        <div class="horizontal_carousel_container page_margin_top">
            <ul class="blog horizontal_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                <?php $kq = $t ->TinCuCungLoai($idTin, $lang, 8); ?> 
                <?php while ($row = $kq ->fetch_assoc()) {?>
                <li class="post tintieptheo">
                    <a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>">
                        <img src='<?=$row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
                    </a>
                    <h5><a href="index.php?p=detail&idTin=<?=$row['TieuDe_KhongDau'];?>" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></h5>
                    <ul class="post_details simple">
                        <li class="date">
                        <?=date('d/m/Y',strtotime($row['Ngay']))?>
                        </li>
                    </ul>
                </li>
             <?php } ?> 
            </ul>
        </div>
    </div>
<div class="row page_margin_top_section">
        <?php $kq = $t ->LayCacYKienCua1Tin($idTin); ?>
        <h4 class="box_header"><?=$kq->num_rows;?> Ý Kiến </h4>
        <ul id="comments_list">
            <?php while($row= $kq ->fetch_assoc()) {?>
            <li class="comment clearfix" id="comment-2">
                <div class="comment_author_avatar">
                    &nbsp;
                </div>
                <div class="comment_details">
                    <div class="posted_by clearfix">
                        <h5><a class="author" href="#" title="Kevin Nomad"><?=$row['HoTen']?></a></h5>
                        <abbr title="22 July 2014" class="timeago"><?=date('d/m/Y',strtotime($row['Ngay']))?></abbr>
                    </div>
                    <p>
                        <?=$row['NoiDung']?> 
                    </p>
                </div>
            </li>
            <?php } ?>
        </ul>


    <div class="row page_margin_top_section">
        <h4 class="box_header">Ý Kiến Bạn Đọc </h4>
        <?php 
        $loi= ""; 
        if (isset($_POST['name']) == true) {
            $hoten = $_POST["name"]; 
            $email = $_POST['email'];
            $noidung = $_POST['messages'];
            $idTin = $_POST['idTin']; 
            $kq =  $t -> LuuYKien($idTin, $noidung, $hoten, $email, $loi);
            if ($loi = "") {
                $url = $_SERVER['REQUEST_URI'];
                $_SESSION['thongbao']="Cám ơn bạn đã đóng góp ý kiến.";
                echo "<script>document.location='{$url}';</script>"; 
                exit();
            }
        }
        ?>
        <div id ="thongbaoYK" style= "background: #ccc; color:red; text-align:center; line-heigh: 150%; margin-top:10px;"> 
        <?php 
        if($loi!="") echo $loi; 
        if(isset($_SESSION['thongbao'])==true) {echo $_SESSION['thongbao']; unset($_SESSION['thongbao']);}
        ?> 
        </div>
        <form class="comment_form margin_top_15" id="comment_form" method="post" action="">
            <fieldset class="column column">
                <input class="text_input" name="name" type="text" value="<?=(isset($_POST['name']))?$_POST['name']:""?>" placeholder="Họ Tên Của Bạn">
            </fieldset>
            <fieldset class="column column">
                <input class="text_input" name="email" type="text" value="<?=(isset($_POST['email']))?$_POST['email']:""?>"  placeholder="Email Của Bạn *">
            </fieldset>
            <fieldset>
                <textarea name="message" <?=(isset($_POST['message']))?$_POST['message']:""?> placeholder="Ý Kiến Của Bạn">Ý Kiến Của Bạn</textarea>
            </fieldset>
            <fieldset>
                <input type="submit" value="GỬI Ý KIẾN" class="more active">
                <a href="#cancel" id="cancel_comment" title="Cancel reply">Cancel reply</a>
            </fieldset>
            <input type="hidden" name="idTin" value="<?=['idTin']?>">
        </form>
    </div>


    <h4 class="box_header page_margin_top_section">Tags</h4>
    <ul class="taxonomies clearfix page_margin_top">
        <li>
            <a href="#" title="Business">BUSINESS</a>
        </li>
        <li>
            <a href="#" title="Education">EDUCATION</a>
        </li>
        <li>
            <a href="#" title="Family">FAMILY</a>
        </li>
        <li>
            <a href="#" title="Film">FILM</a>
        </li>
        <li>
            <a href="#" title="Food">FOOD</a>
        </li>
        <li>
            <a href="#" title="Garden">GARDEN</a>
        </li>
        <li>
            <a href="#" title="People">PEOPLE</a>
        </li>
        <li>
            <a href="#" title="Sport">SPORT</a>
        </li>
    </ul>
    
</div>
