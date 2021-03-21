<!-- ******HEADER****** -->
<header class="header">
    <div class="top-bar">
        <div class="container">
            <form class="pull-right search-form" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Cari...">
                </div>
                <button type="submit" class="btn btn-theme">Go</button>
            </form>
        </div>
    </div><!--//to-bar-->
    <div class="header-main container">
        <h1 class="logo col-md-1 col-sm-1">
            <a href="<?php echo Yii::app()->request->getBaseUrl()?>">
                <img id="logo" src="<?php echo Yii::app()->theme->baseUrl?>/assets2/images/logo.png" alt="Logo" style="width: 100px">
            </a>
        </h1><!--//logo-->
        <div class="col-md-7 col-sm-7">
            <h2 class="title hidden-xs hidden-sm hidden-md"><?php echo Yii::app()->params['header']['name']; ?></h2>
            <h4 class="title hidden-xs hidden-sm hidden-md"><?php echo Yii::app()->params['header']['address']; ?></h4>
            <h4 class="address hidden-lg"><?php echo Yii::app()->params['header']['address']; ?></h4>
        </div>
        <div class="info col-md-4 col-sm-4">
            <div class="contact pull-right">
                <p class="phone"><i class="fa fa-phone"></i>(061) 63799232</p>
                <p class="email"><i class="fa fa-envelope"></i><a href="mailto:khairurrahman@gmail.com">khairurrahman@gmail.com</a></p>
            </div><!--//contact-->
        </div><!--//info-->
    </div><!--//header-main-->
    <!-- ******NAV****** -->
    <nav class="main-nav" role="navigation" id="main-nav">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><!--//nav-toggle-->
            </div><!--//navbar-header-->
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>'Beranda','url'=>array('/site/index'),'itemOptions'=>array('class'=>'nav-item')),
                        array('label'=>'Tentang Kami <i class="fa fa-angle-down"></i>','url'=>array('#'),
                            'items'=>array(
                                array('label'=>'Profile Kampus','url'=>array('/page/profil-perguruan-al-ulum')),
                                array('label'=>'Sejarah Kampus','url'=>array('/page/sejarah-kampus')),
                                array('label'=>'Visi Misi','url'=>array('/page/visi-misi')),
                                array('label'=>'Fasilitas Kampus','url'=>array('/page/fasilitas')),
                                array('label'=>'Dosen','url'=>array('/resources/dosen')),
                                array('label'=>'Prestasi','url'=>array('/news/achievement')),
                            ),
                            'linkOptions'=>array(
                                'class'=>'dropdown-toggle',
                                'data-toggle'=>'dropdown',
                                'data-hover'=>'dropdown',
                                'data-delay'=>0,
                                'data-close-others'=>'false',
                            ),
                            'itemOptions'=>array(
                                'class'=>'nav-item dropdown'
                            ),
                        ),
                        array('label'=>'Berita','url'=>array('/news'),'itemOptions'=>array('class'=>'nav-item')),
                        array('label'=>'Program Studi <i class="fa fa-angle-down"></i>','url'=>array('#'),
                            'items'=>array(
                                array('label'=>'Perbankan Syariah <i class="fa fa-angle-right"></i>','url'=>array('/page/profil-perbankan-syariah'),
                                    'items' => array(
                                            array('label'=> 'Visi Misi', 'url'=>array('/page/')),
                                            array('label'=> 'Tujuan', 'url'=>array('/page/')),
                                            array('label'=> 'Sasaran', 'url'=>array('/page/')),
                                            array('label'=> 'Kurikulum', 'url'=>array('/page/'))
                                    ),
                                    'linkOptions'=>array(
                                        'class'=>'trigger',
                                        'tabindex'=>'-1'
                                    ),
                                    'itemOptions'=>array(
                                        'class'=>'nav-item dropdown-submenu'
                                    ),
                                ),
                                array('label'=>'Ekonomi Syariah <i class="fa fa-angle-right"></i>','url'=>array('/page/profil-ekonomi-syariah'),
                                    'items' => array(
                                        array('label'=> 'Visi Misi', 'url'=>array('/page/')),
                                        array('label'=> 'Tujuan', 'url'=>array('/page/')),
                                        array('label'=> 'Sasaran', 'url'=>array('/page/')),
                                        array('label'=> 'Kurikulum', 'url'=>array('/page/'))
                                    ),
                                    'linkOptions'=>array(
                                        'class'=>'trigger',
                                        'tabindex'=>'-1'
                                    ),
                                    'itemOptions'=>array(
                                        'class'=>'nav-item dropdown-submenu'
                                    ),
                                ),
                            ),
                            'linkOptions'=>array(
                                'class'=>'dropdown-toggle',
                                'data-toggle'=>'dropdown',
                                'data-hover'=>'dropdown',
                                'data-delay'=>0,
                                'data-close-others'=>'false',
                            ),
                            'itemOptions'=>array(
                                'class'=>'nav-item dropdown'
                            ),
                        ),
                        array('label'=>'Galeri','url'=>array('/gallery'),'itemOptions'=>array('class'=>'nav-item')),
                        array('label'=>'Kontak','url'=>array('/site/contact'),'itemOptions'=>array('class'=>'nav-item')),
                        array('label'=>'Akademik <i class="fa fa-angle-down"></i>','url'=>array('#'),
                            'items'=>array(
                                array('label'=>'Pendidikan Pengajaran','url'=>array('/news/pendidikan-pengajaran')),
                                array('label'=>'Penelitian dan Jurnal','url'=>array('/page/penelitian-jurnal')),
                                array('label'=>'Pengabdian Masyarakat','url'=>array('/page/pengabdian-masyarakat')),
                            ),
                            'linkOptions'=>array(
                                'class'=>'dropdown-toggle',
                                'data-toggle'=>'dropdown',
                                'data-hover'=>'dropdown',
                                'data-delay'=>0,
                                'data-close-others'=>'false',
                            ),
                            'itemOptions'=>array(
                                'class'=>'nav-item dropdown'
                            ),
                        ),
                    ),
                    'encodeLabel'=>false,
                    'htmlOptions'=>array(
                        'class'=>'nav navbar-nav'
                    ),
                    'submenuHtmlOptions'=>array(
                        'class'=>'dropdown-menu'
                    )
                ));?>
            </div><!--//navabr-collapse-->
        </div><!--//container-->
    </nav><!--//main-nav-->
    <?php if($this->getId()=='site' && $this->getAction()->getId()=='index') {
        //  $this->renderPartial('/layouts/slider');
        $this->widget('ext.news.EHotNews',array('data'=>News::model()->findHotNews()));
    }?>
</header><!--//header-->