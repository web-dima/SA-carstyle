<?php 
global $post;
$old = $post;	
?>
<?php					
    $count = 1;
	$type = 'flexslider';
    $args=array(
	    'post_type' => $type,
		'posts_per_page' => -1
         );
	$counter = 0;
$flex_query = new WP_Query( $args );
?>	
<!--<div class="container">-->
<!--<div class="row">-->
<!--<div class="col-lg-12">-->
<div id="main-slider" class="flexslider">

				<ul class="slides">
					<?php if($flex_query->have_posts()): 	
					while($flex_query->have_posts()) : $flex_query->the_post();					

					$title = get_post_meta($post->ID, 'iweb_flexslider_title', TRUE);
					$title= explode(' ',$title);
					$title[0]='<span class="bold">'.$title[0].'</span>';
					$title=implode(' ',$title);
					$subtitle = get_post_meta($post->ID, 'iweb_flexslider_caption', TRUE);
                   
                    $img = get_post_meta($post->ID, 'iweb_flexslider_img', TRUE);

                    $slideimg = wp_get_attachment_url( $img );

					$img_w = '1024';
					$img_h = '460';
					$slideimg = aq_resize($slideimg, $img_w, $img_h, true);
					$btntxt = get_post_meta($post->ID, 'iweb_flexslider_btntext', TRUE);
					$btntxt= explode(' ',$btntxt);
					$btntxt[0]='<span class="bold">'.$btntxt[0].'</span>';
					$btntxt=implode(' ',$btntxt);
					$btnurl = get_post_meta($post->ID, 'iweb_flexslider_btnurl', TRUE);
                    ?>	

						<li>

						<?php if ($slideimg !='') { ?>
							<img height="360" src="<?php echo $slideimg; ?>" alt="" />
						<?php } ?>
                            <div class="flex-caption-h1">
                                <h1>Кузовной ремонт всех видов автомобилей на Ленинском</h1>
                            </div>
                            <div class="flex-caption-img">
                                <img  class="block" src="<?php echo get_site_url() .  '/wp-content/uploads/2018/01/garantiya-kachestva-e1517000288876.png'?>">
                            </div>
                            <div class="flex-caption">
                                <h3><?php echo $title; ?></h3>
                                <p><?php echo $subtitle; ?></p>
                            </div>

						</li>
<?php $counter++ ; endwhile; endif;
$post = $old;
?>
				</ul>	

</div>	
<!--</div>-->
<!--</div>-->
<!--</div>-->