<section class="news">
    <h1 class="section-heading text-highlight"><span class="line"><?php echo $this->title ?></span></h1>
    <div class="carousel-controls">
        <a class="prev" href="#news-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
        <a class="next" href="#news-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
    </div><!--//carousel-controls-->
    <div class="section-content clearfix">
        <div id="news-carousel" class="news-carousel carousel slide">
            <div class="carousel-inner">
                <?php foreach($newsList as $idx=>$news) {
                    if($idx == 0)
                        echo '<div class="item active">'.$news.'</div>';
                    else echo '<div class="item">'.$news.'</div>';
                }?>
            </div>
        </div>
    </div><!--//section-content-->
</section><!--//news-->