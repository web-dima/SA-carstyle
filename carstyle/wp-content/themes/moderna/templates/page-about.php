<?php
/*
Template Name: about
*/
get_header();
?>
<h1 style="text-align: center;font-family: Verdana, serif;"><i><?php wp_title('') ?></i></h1>
<?php get_template_part( 'includes/seo'); ?>
<section style="background: #68A4C4;">
    <?php get_template_part( 'includes/file_form'); ?>
</section>
<?php
get_template_part('includes/contact-function');
?>
<?php get_footer(); ?>