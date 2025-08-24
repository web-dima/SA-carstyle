<?php
/**
 * @package WordPress
 * @subpackage Moderna theme
 */
if (empty($feed_url)) { $feed_url = get_bloginfo('rss2_url'); }
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('name');?>" >
    <meta name="keywords" content="покраска, ремонт, авария, краска, аэрография, покраска, покрасить, починить, полировка, отполировать">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- Favicons
	================================================== -->
<?php
	$favicon = ''; $favicon = iwebtheme_smof_data('favicon');
	if (empty($favicon)) { ?>
	<link link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/img/favicon.ico' ?>" />
<?php }	else { ?>
	<link rel="icon" type="image/png" href="<?php echo $favicon ?>" />
<?php } ?>
<!-- wp head -->
<?php
wp_head();
?>
</head>
<body <?php body_class( 'body' ); ?>>

<div id="wrapper">
	<!-- start header -->
	<header id="header" itemscope itemtype="http://schema.org/WPHeader">
        <div class="navbar navbar-default navbar-static-top background-header">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div>
                        <a class="navbar-brand" href="<?php echo home_url(); ?>/">
                            <img  class="block" src="<?php echo iwebtheme_smof_data('top_imglogo'); ?>" alt="CarStyle" width="150" height="150">
                        </a>
                    </div>
                    <meta itemprop="description" content="<?php bloginfo('name');?>">
                    <meta itemprop="headline" content="<?php bloginfo('description');?>">
                    <div class="header-contacts-mini"><img style="width: 30px; margin-top: -10px;" src="<?php echo get_template_directory_uri().'/img/whatsapp.png' ?>">+7-911-920-65-12</div>
                </div>
                <div class="navbar-collapse collapse">
                    <?php
						wp_nav_menu(array(
						'menu_class' => 'nav navbar-nav',
						'container' => false,
						'theme_location' => 'main',
						'fallback_cb' => 'false',
						'walker' => new wp_bootstrap_navwalker(),
						'depth' => 0
						));
						?>
                    <div class="header-contacts">
                        <div itemscope itemtype="http://schema.org/LocalBusiness">
                            <meta itemprop="name" content="Art-style">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <span class="header-phone" ><span itemprop="telephone"><img style="width: 30px; margin-top: -5px; position: absolute; margin-left: -30px;" src="<?php echo get_template_directory_uri().'/img/whatsapp.png' ?>">+7-911-920-65-12</span></span></br>
                                <span style="float: right; text-align: right;font-weight:600;">г. <span itemprop="addressLocality">Санкт-Петербург</span></br><span itemprop="streetAddress">ул. Автомобильная, д. 8</span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
	</header>
    <script type="application/ld+json">
     {
       "@context": "http://schema.org",
       "@type": "Organization",
       "url": "<?php echo home_url(); ?>",
       "logo": "<?php echo iwebtheme_smof_data('top_imglogo'); ?>"
     }
    </script>
	<!-- end header -->