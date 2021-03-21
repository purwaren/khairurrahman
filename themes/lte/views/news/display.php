<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
    'Berita'=>array('/news'),
    $model->title
);
Yii::app()->clientScript->registerScript('img',"
    $('.content img').attr('class','img-responsive');
");
?>
<header class="page-heading clearfix">
    <h1 class="heading-title pull-left"><?php echo CHtml::encode($model->title); ?></h1>
    <!-- <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('ext.ENewBreadcrumbs', array(
            'breadcrumbLabel'=>'Anda berada di',
            'links'=>$this->breadcrumbs,
            'htmlOptions'=>array('class'=>'breadcrumbs pull-right'),
        )); ?>
    <?php endif?> -->
</header>
<div class="page-content">
    <div class="row page-row">
        <div class="news-wrapper col-md-8 col-sm-7">
            <article class="news-item">
                <p class="meta text-muted">Oleh: <a href="#"><?php echo $model->user_create ?></a> | Ditulis pada: <?php echo $model->timestamp_created; ?></p>
                <?php echo $model->content ?>
            </article><!--//news-item-->
        </div><!--//news-wrapper-->
        <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">
            <section class="widget has-divider">
                <h3 class="title">Berita Lainnya</h3>
                <article class="news-item row">
                    <figure class="thumb col-md-3 col-sm-3 col-xs-3">
                        <img src="/images/kantin.jpg" alt="" />
                    </figure>
                    <div class="details col-md-9 col-sm-9 col-xs-9">
                        <h4 class="title"><a href="news-single.html">Prestasi siswa SDIT Khairurrahman</a></h4>
                    </div>
                </article><!--//news-item-->
            </section><!--//widget-->
        </aside>
    </div><!--//page-row-->
</div><!--//page-content-->