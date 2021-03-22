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
                    <div class="footer-col col-md-4 col-xs-12 about">
                        <div class="footer-col-inner">
                            <h3>Sosial Media</h3>
                            <ul>
                                <li><a href="https://web.facebook.com/sdit.khairurrahman"><i class="fa fa-2x fa-facebook-square"></i> SDIT Khairur Rahman</a></li>
                                <li><a href="https://www.instagram.com/sditkhairurrahman/"><i class="fa fa-2x fa-instagram"></i>@sditkhairurrahman</a></li>
                            </ul>
                        </div><!--//footer-col-inner-->
                    </div>
                    <div class="footer-col col-md-4 col-xs-12 about">
                        <div class="footer-col-inner">
                            <h3>Tentang Kami</h3>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('page/visi-misi')?>"><i class="fa fa-caret-right"></i>Visi Misi</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('page/sejarah-singkat')?>"><i class="fa fa-caret-right"></i>Sejarah Singkat</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('page/profil-pimpinan')?>"><i class="fa fa-caret-right"></i>Profil Pimpinan</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('page/peta-sekolah')?>"><i class="fa fa-caret-right"></i>Peta Sekolah</a></li>
                            </ul>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col col-md-4 col-xs-12 contact">
                        <div class="footer-col-inner">
                            <h3>Kontak Kami</h3>
                            <div class="row">
                                <p class="adr clearfix col-md-12 col-sm-4">
                                    <i class="fa fa-map-marker pull-left"></i>
                                    <span class="adr-group pull-left">
                                        <span class="street-address">Jalan Arief Rahman Hakim, Gg Suka Hati No. 1</span><br>
                                        <span class="region">Kec. Medan Area, Kota Medan, Sumatra Utara</span><br>
                                        <span class="postal-code">Sumatra Utara - 20215, Indonesia</span><br>
                                    </span>
                                </p>
                                <p class="tel col-md-12 col-sm-4"><i class="fa fa-mobile"></i>0852 6046 6046</p>
                                <p class="tel col-md-12 col-sm-4"><i class="fa fa-whatsapp"></i>0812 6493 396</p>
                            </div>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                </div>
            </div>
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <small class="copyright col-md-6 col-sm-12 col-xs-12">Copyright &copy;  SDIT Khairur Rahman | Developed By <a href="mailto:info@coreinitiative.id">Core Initiative Studio</a> | <?php echo Yii::powered()?></small>
                    <ul class="social pull-right col-md-6 col-sm-12 col-xs-12">
                        <li><a href="https://web.facebook.com/sdit.khairurrahman" ><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="https://www.instagram.com/sditkhairurrahman/" ><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" ><i class="fa fa-youtube-square"></i></a></li>
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

