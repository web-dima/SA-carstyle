<?php
/*
Template Name: sales
*/
get_header();
?>
<section id="content" class="nopadtop">
<h1 align="center"><?php wp_title('') ?></h1>
<p align="center"><i>Добро пожаловать в центр кузовного ремонта «Арт-Стайл»!Мы производим ремонт кузова любой сложности.</i></p>
<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <div class="shadow rounded-corners clearfix colelem sales-block sales-block-first" >
                <div class="shadow museBGSize rounded-corners grpelem sales-element sales-element-first-img" ></div>
                <div class="grpelem sales-separate" ><!-- simple frame --></div>
                <div class="clearfix grpelem sales-text" ><!-- content -->
                    <p><span class="sales-text-bold">Эвакуатор бесплатно.</span></p>
                    <p>Бесплатная доставка до центра кузовного ремонта. Действует только при осуществлении ремонта в нашей компании.</p>
                </div>

            </div>
            <div class="shadow rounded-corners clearfix colelem sales-block sales-block-third" >
                <div class="shadow museBGSize rounded-corners grpelem sales-element sales-element-third-img" ></div>
                <div class="grpelem sales-separate" ><!-- simple frame --></div>
                <div class="clearfix grpelem sales-text" ><!-- content -->
                    <p>&nbsp;</p>
                    <p><span class="sales-text-bold">Полировка в подарок!</span></p>
                    <p>Закажи работ от 50000 руб. и получи полировку фар в подарок.</p>
                </div>

            </div>
            <div class="shadow rounded-corners clearfix colelem sales-block sales-block-four" >
                <div class="shadow museBGSize rounded-corners grpelem sales-element sales-element-four-img" ></div>
                <div class="grpelem sales-separate" ><!-- simple frame --></div>
                <div class="clearfix grpelem sales-text" ><!-- content -->
                    <p>&nbsp;</p>
                    <p><span class="sales-text-bold">Ваши идеи - наши скидки!</span></p>
                    <p>Предложите ваш вариант скидок и мы обязательно рассмотрим их.</p>
                </div>

            </div>
        </div>
	</div>
</div>
</section>
<?php get_template_part( 'includes/seo'); ?>
<section style="background: #68A4C4;">
    <?php get_template_part( 'includes/file_form'); ?>
</section>
<?php
get_template_part('includes/contact-function'); 
?>	
<?php get_footer(); ?>