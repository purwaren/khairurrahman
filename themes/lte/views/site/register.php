<?php
/* @var $this PageController */

$this->breadcrumbs=array(
	'Registrasi'
);
Yii::app()->clientScript->registerScript('img',"
    $('.page-content img').attr('class','img-responsive');
");
?>
<header class="page-heading clearfix">
	<h1 class="heading-title pull-left">Formulir Registrasi</h1>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('ext.EBreadcrumbs', array(
				'breadcrumbLabel'=>'Anda berada di',
				'links'=>$this->breadcrumbs,
				'htmlOptions'=>array('class'=>'breadcrumbs pull-right'),
		)); ?>
	<?php endif?>
</header>
<div class="page-content">
	<div class="row">
		<div class="page-row col-md-8 col-sm-7">
			<article class="contact-form">
				<p>Isian bertanda * tidak boleh dikosongkan</p>
				<?php ?>
			</article>
		</div><!--//terms-wrapper-->
		<aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
			<section class="widget">
				<h3 class="title">Kontak</h3>
				<p>Untuk informasi lebih lengkap, anda bisa menghubungi nomor telepon dan alamat email yang tertera di bawah ini</p>
				<p class="tel"><i class="fa fa-phone"></i>Tel: (061)  6642331</p>
				<p class="email"><i class="fa fa-envelope"></i>Email: <a href="mailto:alulum.terpadu@gmail.com">alulum.terpadu@gmail.com</a></p>
			</section><!--//widget-->
		</aside>
	</div><!--//page-row-->
</div><!--//page-content-->
