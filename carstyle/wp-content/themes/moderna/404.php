<?php
get_header(); 
$page_title = iwebtheme_smof_data('error_title');
?>
<!-- PAGE TITLE -->
<section id="content">
	<div class="container">
		<div class="row">
		<div class="col-lg-12">
			<div class="aligncenter">
				<h1>404</h1>
				<h4><?php echo iwebtheme_smof_data('error_content');?></h4>
			</div>
		</div>
		</div>
	</div>
</section>	
<?php get_footer(); ?>