<?php
/*
Template Name: Portfolio
*/
get_header();
?>
<h1 align="center"><?php wp_title(''); ?></h1>
<section id="content" style="padding: 10px 0px 10px 17px;">
    <?php echo do_shortcode('[ape-gallery 42]');?>
</section>
<?php get_template_part( 'includes/seo'); ?>
<section style="background: #68A4C4;">
    <?php get_template_part( 'includes/file_form'); ?>
</section>
<?php
get_template_part('includes/contact-function');
?>
<?php get_footer(); ?>