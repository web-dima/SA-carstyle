<?php
/*
Template Name: Contact page
*/
get_header();
?>
<section id="content" class="nopadtop">
<h3 class="aligncenter">Контактная информация:</h3>
<div class="container">
	<div class="row">
        <div class="col-lg-6 col-sm-</div>6">
            <div itemscope itemtype="http://schema.org/LocalBusiness">
                <meta itemprop="name" content="Art-style">
                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <p><i class="fa fa-phone fa-1x"></i> Телефон клиентского центра: <span itemprop="telephone">+7-911-920-65-12</span></p>
                    <p><i class="fa fa-envelope fa-1x"></i> График call-центра: пн-пт 10:00-20:00, сб: 11:00-20:00, вс: 11:00-20:00</p>
                    <p><i class="fa fa-envelope fa-1x"></i> Электронная почта: <span itemprop="email">I9112268665@yandex.ru</span></p>
                    <p><i class="fa fa-map-marker fa-1x"></i> Адрес: г. <span itemprop="addressLocality">Санкт-Петербург</span>, <span itemprop="streetAddress">Автомобильная ул., д. 8, бокс 22</span></p>
                </div>
                    <p><i class="fa fa-calendar fa-1x"></i> График работы малярного цеха: <time itemprop="openingHours" datetime="Mo-Fr 09:00−21:00">будние дни с 09:00 до 21:00</time>. Все визиты просьба согласовывать по телефону. (посещение только по предварительной записи)</p>
                <p><i class="fa fa-exclamation-circle fa-1x"></i> Просим учитывать, что графики работы call-центра и малярного цеха - отличаются.</p>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
              <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A94d62922695b9be053a31fe80acaf9601e4efb353e6a80bcd5ef3a0b994d429b&amp;width=100%&amp;height=340&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </div>
</div>
</section>
<?php get_template_part( 'includes/seo'); ?>
<section style="background: #68A4C4;">
    <?php get_template_part('includes/file_form'); ?>
</section>
<?php
get_template_part('includes/contact-function');
?>
    <div id="wrapper">
        <footer>
        </footer>
    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<?php echo stripslashes(iwebtheme_smof_data('google_analytics')); ?>
<?php get_footer(); ?>