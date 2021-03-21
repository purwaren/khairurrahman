<section class="video">
    <h1 class="section-heading text-highlight"><span class="line"><?php echo $this->title ?></span></h1>
    <div class="carousel-controls">
        <a class="prev" href="#videos-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
        <a class="next" href="#videos-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
    </div><!--//carousel-controls-->
    <div class="section-content">
        <div id="videos-carousel" class="videos-carousel carousel slide">
            <div class="carousel-inner">
                <?php
                    foreach ($items as $idx=>$item) {
                        if($idx==0) {
                ?>
                        <div class="item active">
                            <iframe class="video-iframe" src="<?php echo $item['url']?>?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
                        </div>
                <?php } else {?>
                            <div class="item">
                                <iframe class="video-iframe" src="<?php echo $item['url']?>?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
                            </div>
                <?php }  } ?>
            </div><!--//carousel-inner-->
        </div><!--//videos-carousel-->
        <p class="description">
            <?php echo $album->description; ?>
        </p>
    </div><!--//section-content-->
</section>