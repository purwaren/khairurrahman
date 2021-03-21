<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>   
    <!-- Global CSS -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/pretty-photo/css/prettyPhoto.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/assets2/css/fonts.css">
    <link id="theme-style" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/assets2/css/styles-custom.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
    if($this->getId()=='site' && $this->getAction()->getId()=='index')
        $options = array('class'=>'home-page');
    else $options = array();
?>
<?php echo CHtml::openTag('body',$options)?>
    <div class="wrapper">
        <?php $this->renderPartial('/layouts/navbar'); ?>

        <div class="content container">
            <?php echo $content; ?>
        </div>
    </div><!--//wrapper-->

    <!-- ******FOOTER****** -->
    <footer class="footer" style="margin-top: 15px">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-3 col-sm-4 about">
                        <div class="footer-col-inner">
                            <h3>About</h3>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('page/profil-perguruan-al-ulum')?>"><i class="fa fa-caret-right"></i>Tentang Kami</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('site/contact')?>"><i class="fa fa-caret-right"></i>Kontak Kami</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('page/privacy-policy')?>"><i class="fa fa-caret-right"></i>Kerahasiaan Data</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('page/terms-and-conditions')?>"><i class="fa fa-caret-right"></i>Syarat dan Ketentuan</a></li>
                            </ul>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col col-md-6 col-sm-8 newsletter">
                        
                    </div><!--//foooter-col-->
                    <div class="footer-col col-md-3 col-sm-12 contact">
                        <div class="footer-col-inner">
                            <h3>Kontak Kami</h3>
                            <div class="row">
                                <p class="adr clearfix col-md-12 col-sm-4">
                                    <i class="fa fa-map-marker pull-left"></i>
                                    <span class="adr-group pull-left">
                                        <span class="street-address">Jalan Tuasan No. 37</span><br>
                                        <span class="region">Kota Medan</span><br>
                                        <span class="postal-code">Kode Pos 20222</span><br>
                                        <span class="country-name">Indonesia</span>
                                    </span>
                                </p>
                                <p class="tel col-md-12 col-sm-4"><i class="fa fa-phone"></i> (061) 42065275</p>
                                <p class="tel col-md-12 col-sm-4"><i class="fa fa-fax"></i> (061) 42065275</p>
                                <p class="email col-md-12 col-sm-4"><i class="fa fa-envelope"></i><a href="#">stebialulum@yahoo.com</a></p>
                            </div>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                </div>
            </div>
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <small class="copyright col-md-6 col-sm-12 col-xs-12">Copyright &copy;  Perguruan Islam Al-Ulum Terpadu | Developed By <a href="mailto:putramudamandiri@gmail.com">Putra Muda Mandiri</a> | <?php echo Yii::powered()?></small>
                    <ul class="social pull-right col-md-6 col-sm-12 col-xs-12">
                        <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" ><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>
                        <li class="row-end"><a href="#" ><i class="fa fa-rss"></i></a></li>
                    </ul><!--//social-->
                </div><!--//row-->
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->

    <!-- Javascript -->          
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/jquery-placeholder/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/pretty-photo/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/plugins/jflickrfeed/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/js/main.js"></script>
</body>
</html> 

