<?php

	$assetsManager = Yii::app()->clientScript;
	$assetsManager->registerCoreScript('jquery');
	$assetsManager->registerCoreScript('jquery.ui');

	// Disable jquery-ui default theme
	$assetsManager->scriptMap=array(
		'jquery-ui.css'=>false,
	);
?>
<!DOCTYPE html>

<html class=" js flexbox flexboxlegacy rgba multiplebgs backgroundsize borderradius boxshadow textshadow opacity cssgradients csstransforms csstransforms3d csstransitions generatedcontent svg inlinesvg" dir="ltr" lang="en-US" style="height: auto;"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
	<title><?php echo CHtml::encode($this->pageTitle) ?></title>
	<meta charset="UTF-8"/>
	<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
	<meta name="description" content="<?php echo CHtml::encode($this->pageDescription) ?>">
	<meta name="keywords" content="<?php echo CHtml::encode($this->pageKeywords) ?>">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jqueryui/css/custom-theme/jquery-ui-1.8.19.custom.css">


	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/reset.css" rel="stylesheet" type="text/css" media="screen">
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/contact.css" rel="stylesheet" type="text/css" media="screen">
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/styles.css" rel="stylesheet" type="text/css" media="screen">
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/fontello.css" rel="stylesheet" type="text/css" media="screen">
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen">
	<!--[if gt IE 8]><!--><link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen"><!--<![endif]-->
	<!--[if !IE]> <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /> <![endif]-->
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/open-menu.css" rel="stylesheet" type="text/css" media="screen">
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/print.css" rel="stylesheet" type="text/css" media="print">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,300italic,600,700,800" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,400italic,600" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lora:400,400italic,600" rel="stylesheet" type="text/css">
	<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/modernizr.js" type="text/javascript"></script>
</head>
<body class="aligned post-page">

<!-- Preloader -->
<div id="preloader">
	<div id="status">
		<div class="parent">
			<div class="child">
				<p class="small">loading</p>
			</div>
		</div>
	</div>
</div>
<div id="background-color"></div>
<header id="header">
	<div class="containing-wrapper">
		<div class="logo-wrapper">
			<h1 id="logo"><a href="http://ppp-templates.de/hr/index.html">Harrison</a></h1>
			<div class="tagline"><span>digital. forward.</span></div>
		</div>
		<div id="menu-button">
			<div class="centralizer">
				<div class="cursor">Menu
					<div id="nav-button"> <span class="nav-bar"></span> <span class="nav-bar"></span> <span class="nav-bar"></span> </div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- end header -->
<!-- start main nav -->
<div class="containing-wrapper menu">
	<nav id="main-nav">
		<div id="menu-close-button">×</div>
		<ul id="options" class="option-set clearfix <?php echo $this->isHome() ? 'home' : '' ?>" data-option-key="filter">
			<li >
				<a data-filter="home" href="<?php echo Yii::app()->createAbsoluteUrl('/store/index/index') ?>#home"   >
					<?php echo Yii::t('core','Главная') ?>
				</a>
			</li>
			<li>
				<a data-filter="portfolio" href="<?php echo Yii::app()->createAbsoluteUrl('/store/index/index') ?>#portfolio">
					<?php echo Yii::t('core','Концерты') ?>
				</a>
			</li>
			<li>
				<a data-filter="about" href="<?php echo Yii::app()->createAbsoluteUrl('/store/index/index') ?>#about">
					<?php echo Yii::t('core','О нас') ?>
				</a>
			</li>
			<li>
				<a data-filter="pricing" href="<?php echo Yii::app()->createAbsoluteUrl('/store/index/index') ?>#pricing">
					<?php echo Yii::t('core','Услуги агенства') ?>
				</a>
			</li>
			<li>
				<a data-filter="gallery" href="<?php echo Yii::app()->createAbsoluteUrl('/store/index/index') ?>#gallery">
					<?php echo Yii::t('core','Галерея') ?>
				</a>
			</li>
			<li>
				<a data-filter="blog" href="<?php echo Yii::app()->createAbsoluteUrl('/store/index/index') ?>#blog">
					<?php echo Yii::t('core','Места проведения') ?>
				</a>
			</li>
			<li>
				<a data-filter="contact" href="<?php echo Yii::app()->createAbsoluteUrl('/store/index/index') ?>#contact">
					<?php echo Yii::t('core','Контакты') ?>
				</a>
			</li>
		</ul>
		<div class="social-links">
			<ul class="social-list clearfix">
				<li> <a href="#" class="icon-facebook"></a> </li>
			</ul>
		</div>
	</nav>
</div>
<!-- end main nav -->
<div id="content">
	<div class="container">
		<div id="container" class="clearfix" style="position: relative; height: 1405px;">
			<?php echo $content ?>
		</div>
		<!-- end #container -->
	</div>
	<!-- end .container -->
</div>
<!-- end content -->
<footer id="footer" class="clearfix">
	<div class="containing-wrapper">
		<p class="alignleft">© 2015, Harrison. All Rights Reserved.</p>
		<p class="alignright">285 Lexington Ave, New York, NY <span class="padding">·</span> (845)&nbsp;123-4567 <span class="padding">·</span> <a href="mailto:info@barrow.com" title="Write Email">info@harrison.com</a> </p>
	</div>
</footer>


<!--<script src="--><?php //echo Yii::app()->theme->baseUrl ?><!--/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>-->
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/retina.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.touchSwipe.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.isotope2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.ba-bbq.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/packery-mode.pkgd.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/SmoothScroll.js" type="text/javascript"></script>

<?php if($this->isHome()): ?>
	<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/main2.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.isotope.load.js" type="text/javascript"></script>
<?php else: ?>
	<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.isotope.load.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/main.js" type="text/javascript"></script>
<?php endif; ?>


<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/input.fields.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/preloader.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.sliphover.min.js"></script>



</body>
</html>