<section class="promo box box-dark">
    <div class="col-md-9">
        <h1 class="section-heading">Mari Bergabung </h1>
        <p>
            
        </p>
    </div>
    <div class="col-md-3">
        <a class="btn btn-cta" href="<?php echo Yii::app()->createUrl('/register')?>"><i class="fa fa-play-circle"></i>Pendaftaran Online</a>
    </div>
</section><!--//promo-->
<div class="row cols-wrapper">
    <div class="col-md-9">
        <?php $this->widget('ext.news.ELatestNews',array('data'=>News::model()->findLatestNews()))?>
    </div>
    <div class="col-md-3">
        <?php $this->widget('ext.news.ESidebarNews',array(
            'data'=>News::model()->findLatestAchievement(),
            'title'=>'Prestasi',
            'pageSize'=>1
        ))?>
        <?php $this->widget('ext.album.ELatestVideo',array(
            'data'=>Album::getAllLatestVideo(),
            'album'=>Album::getLatestVideoAlbum()
        ))?>
        <section class="video">
            <h1 class="section-heading text-highlight"><span class="line">Fasilitas</span></h1>
            <div class="carousel-controls">
                <a class="prev" href="#photo-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                <a class="next" href="#photo-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
            </div><!--//carousel-controls-->
            <div class="section-content">
                <div id="photo-carousel" class="videos-carousel carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo Yii::app()->request->baseUrl?>/images/ruang_kelas.jpg" class="img-thumbnail">
                            <p class="description">Ruang Kelas.</p>
                        </div><!--//item-->
                        <div class="item">
                            <img src="<?php echo Yii::app()->request->baseUrl?>/images/olahraga.jpg" class="img-thumbnail">
                            <p class="description">Fasilitas olahraga.</p>
                        </div>
                        <div class="item">
                            <img src="<?php echo Yii::app()->request->baseUrl?>/images/kantin.jpg" class="img-thumbnail">
                            <p class="description">Kantin Mahasiswa.</p>
                        </div>
                    </div><!--//carousel-inner-->
                </div><!--//videos-carousel-->
            </div><!--//section-content-->
        </section><!--//video-->
        <section class="testimonials">
            <h1 class="section-heading text-highlight"><span class="line">Tabloid</span></h1>
            <div class="section-content">
                <div class="testimonials-carousel carousel slide">
                    <img src="<?php echo Yii::app()->request->baseUrl?>/themes/edu/assets/images/gallery/gallery-thumb-2.jpg" class="img-thumbnail">
                </div>
                <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <blockquote class="quote">
                                <p><i class="fa fa-quote-left"></i>I’m very happy interdum eget ipsum. Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst. Integer mattis varius ipsum, posuere posuere est porta vel. Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.</p>
                            </blockquote>
                        </div><!--//item-->
                    </div><!--//carousel-inner-->
                </div><!--//testimonials-carousel-->
                <a class="read-more" href="index">Download<i class="fa fa-chevron-right"></i></a>
            </div><!--//section-content-->
        </section><!--//testimonials-->
        <section class="events">
            <h1 class="section-heading text-highlight"><span class="line">Kegiatan</span></h1>
            <div class="section-content">
                <div class="event-item">
                    <p class="date-label">
                        <span class="month">FEB</span>
                        <span class="date-number">18</span>
                    </p>
                    <div class="details">
                        <h2 class="title">Open Day</h2>
                        <p class="time"><i class="fa fa-clock-o"></i>10:00am - 18:00pm</p>
                        <p class="location"><i class="fa fa-map-marker"></i>East Campus</p>
                    </div><!--//details-->
                </div><!--event-item-->
                <div class="event-item">
                    <p class="date-label">
                        <span class="month">SEP</span>
                        <span class="date-number">06</span>
                    </p>
                    <div class="details">
                        <h2 class="title">E-learning at College Green</h2>
                        <p class="time"><i class="fa fa-clock-o"></i>10:00am - 16:00pm</p>
                        <p class="location"><i class="fa fa-map-marker"></i>Learning Center</p>
                    </div><!--//details-->
                </div><!--event-item-->
                <a class="read-more" href="events.html">All events<i class="fa fa-chevron-right"></i></a>
            </div><!--//section-content-->
        </section><!--//events-->
    </div><!--//col-md-3-->
</div><!--//cols-wrapper-->
