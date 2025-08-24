<?php
/*
Template Name: Homepage
*/
get_header();
?>
<section id="featured">
<?php get_template_part('includes/slider-flexslider'); ?>
</section>
<section style="color: #f8f8f8;" id="count-section">
    <div class="container">
        <h3 id="mini-title-h3">Кузовной ремонт всех видов автомобилей на Ленинском</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-4 spin-padding-top">
                        <div class="aligncenter count-block">
                            <h1><?php echo random_int(8, 10);?></h1>
                            <p>Сейчас автомобилей в ремонте</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 spin-padding-top">
                        <div class="aligncenter count-block">
                            <h1><?php echo random_int(1, 2);?></h1>
                            <p>Свободных мест в цехе</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 spin-padding-top">
                        <div class="aligncenter count-block">
                            <h1><?php echo date('d') * 4;?></h1>
                            <p>Отремонтированно в этом месяце</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="content">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="box">
                        <div class="box-gray aligncenter">
                            <h4>СПЕЦИАЛИСТЫ</h4>
                            <div class="icon">
                                <i class="fa fa-check fa-3x"></i>
                            </div>
                            <p>Профессиональные специалисты с многолетним опытом работы, в том числе и на дилерских станциях, решат любую проблему Вашего автомобиля.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" onclick="redirect('<?php get_site_url(); ?>/price')">
                    <div class="box">
                        <div class="box-gray aligncenter">
                            <h4>НИЗКИЕ ЦЕНЫ</h4>
                            <div class="icon">
                                <i class="fa fa-check-square-o fa-3x"></i>
                            </div>
                            <p>
                                В нашем центре Вы всегда можете рассчитывать на оптимальный объем работ, сжатые сроки и низкие цены на все виды услуг.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box">
                        <div class="box-gray aligncenter">
                            <h4>БЕЗОПАСНОСТЬ</h4>
                            <div class="icon">
                                <i class="fa fa-wrench fa-3x"></i>
                            </div>
                            <p>
                                На всем протяжении ремонта Ваш автомобиль находится на охраняемой территории, оборудованной системами видеонаблюдения.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" onclick="redirect('<?php get_site_url(); ?>/portfolio')">
                    <div class="box">
                        <div class="box-gray aligncenter">
                            <h4>КАЧЕСТВО</h4>
                            <div class="icon">
                                <i class="fa fa-thumbs-o-up fa-3x"></i>
                            </div>
                            <p>
                                В своей работе мы используем только качественные материалы проверенных производителей, а благодаря опыту сотрудников и работе на профессиональном оборудовании (стапель, камеры подготовки и покраски) все услуги по малярно-кузовному ремонту выполняются качественно и точно в срок.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php get_template_part( 'includes/seo'); ?>
<section style="background: #68A4C4;padding-bottom: 20px;">
    <?php get_template_part( 'includes/file_form'); ?>
</section>
<section style="background: #68A4C4;padding-bottom: 5px;">
    <div class="map" id="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A94d62922695b9be053a31fe80acaf9601e4efb353e6a80bcd5ef3a0b994d429b&amp;width=100%&amp;height=340&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
    <div itemscope itemtype="http://schema.org/LocalBusiness">
        <meta itemprop="name" content="Art-style">
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <h4 style="margin-top: 15px;color: white;" class="aligncenter"><span itemprop="addressLocality">Санкт-Петербург</span>,<span itemprop="streetAddress">ул. Автомобильная, д.8</span> тел. <span itemprop="telephone">8(911)920-65-12</span></h4>
        </div>
    </div>
</section>
<?php
get_template_part('includes/contact-function');
?>
<?php get_footer(); ?>