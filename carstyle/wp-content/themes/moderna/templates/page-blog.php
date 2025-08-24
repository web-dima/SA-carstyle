<?php
/*
Template Name: Blog page
*/
$sidebar_pos = iwebtheme_smof_data('sidebar_pos');
get_header();
?>
<section id="content">
<div class="container">
	<div class="row">
	<?php if ($sidebar_pos == 'left') { ?>
		<?php get_sidebar(); ?>
	<?php } ?>	
		<div class="col-lg-12">
		<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?> 
			<?php get_template_part( 'includes/content' ); ?>
					<?php endwhile; ?>

			<?php if (function_exists("pagination")) { ?>
			<?php pagination(); ?>
			<?php } else {
			posts_nav_link(' &#183; ', 'previous page', 'next page'); 	
			} ?>
		
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		</div>
	</div>
</div>
</section>
<section style="background: #68A4C4;padding-bottom: 20px;">
    <?php get_template_part( 'includes/file_form'); ?>
</section>
<?php
get_template_part('includes/contact-function');
?>
<!-- end of section -->
<?php get_footer(); ?>